<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Curso;
use App\Models\Lmsalumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    //

    /**
     * Metodo para enviar formulario a la API-LMS
     *
     * @author Hector Vilches
     *
     * @return json
     */
    public function sasiKidsSendForm(Request $req)
    {

        $reglas = array(
            "nombre" => "required",
            "apellido" => "required",
            "email" => "required",
            "rut" => "required"
        );
        $msgValidacion = array(
            "nombre.required" => "Por favor ingresar un Nombre",
            "apellido.required" => "Por favor ingresar un Apellido",
            "email.required" => "Por favor ingresar un Correo",
            "rut.required" => "Por favor ingresar un Rut"

        );

        $validador = Validator::make($req->all(), $reglas, $msgValidacion);
        $data['status'] = 'error';

        if ($validador->passes()) {

            $datosJson = [
                "nombre" => $req->nombre,
                "apellido" => $req->apellido,
                "email" => $req->email,
                "rut" => $req->rut,
            ];

            $url = env("URL_API_LMS", "https://api-lms.vgroup.cl/api") . "/alumno/set-programa-kids";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json', "Length" => count($datosJson)));
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datosJson));
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            Log::info($url);
            $respuesta = curl_exec($curl);
            $errstr = null;
            if (curl_errno($curl)) {
                $errstr = curl_errno($curl) . ": " . curl_error($curl);
                Log::info(json_encode($errstr));
                $data['title'] = "Error!";
                $data['icon'] = "error";
                $data['timer'] = 3000;
                $data['text'] = "Ocurrió un error: " . json_encode($errstr);
            } else {
                Log::info(json_encode($respuesta));
                $data['title'] = "Perfecto!";
                $data['status'] = "success";
                $data['icon'] = "success";
                $data['timer'] = 7000;
                $data['text'] = "Muchas gracias por inscribirte, estamos muy felices de tenerte. En breve te enviaremos un correo. ¡Prepárate para todas las novedades!";
            }
            curl_close($curl);
        } else {
            $errors = $validador->errors();
            $text = '';
            foreach ($errors->messages() as $key => $error) {
                foreach ($error as $value) {
                    $text .= $value . "\n";
                }
            }
            $data['title'] = "Error!";
            $data['icon'] = "error";
            $data['timer'] = 3000;
            $data['text'] = $text;
        }


        return response()->json($data);
    }

    public function consultacla(Request $req)
    {

        if (session()->get('userSession')) {
            $url = 'https://matriculaudd.vgroup.cl/tiene-beneficio/' . $req->rut;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $response = json_decode(curl_exec($curl));
            $errstr = null;
            if (isset($response->code) && $response->code == 100) {
                // Se registra al usuario en curso LMS
                $this->inscribirAlumno(session()->get('userSession'), $req->idCursoLms, $req->idCursoSasi);
                // Despliega data para mensaje de exito
                $data['title'] = "Perfecto!";
                $data['status'] = "success";
                $data['icon'] = "success";
                $data['type'] = "success";
                $data['timer'] = 7000;
                $data['text'] = "Muchas gracias por inscribirte, estamos muy felices de tenerte. En breve te enviaremos un correo. ¡Prepárate para todas las novedades!";
            } else {
                $data['title'] = "Error!";
                $data['icon'] = "error";
                $data['type'] = "error";
                $data['timer'] = 3000;
                if (curl_errno($curl)) {
                    $errstr = curl_errno($curl) . ": " . curl_error($curl);
                    Log::info(json_encode($errstr));
                    $data['text'] = "Ocurrió un error: " . json_encode($errstr);
                } else {
                    $data['text'] = "Desconocido";
                }
            }
            curl_close($curl);
        } else {
            $data['title'] = "Advertencia!";
            $data['status'] = "warning";
            $data['icon'] = "warning";
            $data['type'] = "warning";
            $data['timer'] = 7000;
            $data['text'] = "Antes de inscribirte en este curso debes estar registrado en la plataforma.";
        }


        return response()->json($data);
    }

    private function inscribirAlumno($infoAlumno, $idCursoLms, $idCursoSasi)
    {
        $params_usuario_from = (object) array(
            'name' => $infoAlumno->nombre,
            'lastname' => $infoAlumno->apellido,
            'email' => $infoAlumno->email,
            'idAlumno' => $infoAlumno->idAlumno,
            'is_new' => false,
        );
        //Log::info(json_encode($infoAlumno));

        //retorna lista de nombres de cursos agregados
        $compraSasi = $this->flujoCargaCursos($params_usuario_from, $idCursoLms, $idCursoSasi);
        //Log::info(json_encode($compraSasi));
        $objCurso = new Curso;
        $html = $objCurso->getPlantilla($params_usuario_from->is_new == true ? 12 : 13);
        $asunto = $html->subject;
        $html = $html->htmlPlantilla;

        //Se limpia el array para obtener los nombres de cursos
        $stringCursos = implode(" ", $compraSasi);
        $html = str_replace("[nombre_recibe]", $infoAlumno->nombre . ' ' . $infoAlumno->apellido, $html);
        $html = str_replace("[listado_cursos]", $stringCursos, $html);
        $dataBoleta = null;

        $html = str_replace("[url_boleta_factura]", " ", $html);

        $paramEnvioEmail = [
            "emailFrom" => 'hola@sasi.cl',
            'subject' => $asunto,
            'plantillaHtml' => $html
        ];

        return Mail::to($infoAlumno->email)->send(new SendMail($paramEnvioEmail));
    }


    private function flujoCargaCursos($params_usuario, $idCursoLms, $idCursoSasi)
    {

        $objLmsalumno = new Lmsalumno();
        $arrayDataCurso = [];
        $nombreCursosArray = null;
        $cursoCursoLms = $objLmsalumno->getNombreCursolms($idCursoLms);
        $paramMatricula = array(
            'idCurso' => $idCursoLms,
            'idAlumno' => $params_usuario->idAlumno,
            'rol' => 1,
            'esSence' => 2,
            'codSence' => '',
            'senceNet' => '',
            'idEmpresa' => 92,
            'origen' => 2,
            'fechaExpiracion' => date("Y-m-d", strtotime("30 days")),
            'tagRetail' => 'CLA Inscripción',
        );

        $insertAlumno = $objLmsalumno->insertMatriculaAlumno($paramMatricula);
        $arrayDataCurso[] = ['idCursoSasi' => $idCursoSasi, 'idCursoLms' => $idCursoLms, 'idAxC' => $insertAlumno];
        $nombreCursosArray[] = $cursoCursoLms->tituloCurso . '<br>';

        return $nombreCursosArray;

    }
}
