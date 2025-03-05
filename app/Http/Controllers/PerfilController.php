<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;
use App\Models\Lmsalumno;
use App\Models\UserLms;
use App\Product;
use Exception;
use Illuminate\Support\Facades\Session;
use Validator;

class PerfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        // // if(Session::get('userSession') == null){
        // // // //    //redireccionar al login por que no se ha logeado
        // // // //    return view('auth.login');
        // // // dd("xd");
        // // // }
        // dd( Auth::check() );
        // // $this->middleware('auth');
        // dd( Session::get('userSession') );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if(Session::get('userSession') == null){
            //redireccionar al login por que no se ha logeado
            return view('auth.login');
        }else{
            $this->objAlumno = new Lmsalumno();
            //acá esta logeado el usuario por session entonces seguir el procedimiento
            $userMail = Session::get('userSession')->email;
            $infoAlumno = $this->objAlumno->getInfoAlumnoByParam($userMail);
            $listadoCursosAlumnos = $this->objAlumno->getInfoAlumnoxCursoByParam($infoAlumno->idAlumno);
            $infoAlumno = Session::get('userSession');

            $categorias = Category::orderBy('id', 'DESC')->get();

            $this->objuserLms = new UserLms;
            $listaproductos = Product::get();
            $sugeridos =  $this->objuserLms->cursosSugeridos($infoAlumno->idAlumno,$listaproductos[0]->id_lms);
            $productos = [];
             if(count($sugeridos) > 0){
                 $productos = [];
                 for($i = 0; $i < count($sugeridos); $i++){
                    if (isset($sugeridos[$i]->id)){
                        $producto = Product::where("id_lms",$sugeridos[$i]->id)->get()->first();
                        if($producto != ""){
                            array_push($productos,$producto);
                        }
                    }

                 }
             }


            $listadoCursosAlumnos->each(function ($lmscurso) {
                $lmscurso->nombreProfesor = $this->objAlumno->getProfesorCurso($lmscurso->idCurso);
                $lmscurso->avanceCurso = round($lmscurso->avanceCurso);
                if($lmscurso->avanceCurso == 0){
                    $lmscurso->filtro = "filter-AN";
                }elseif($lmscurso->avanceCurso > 0 && $lmscurso->avanceCurso < 100){
                    $lmscurso->filtro = "filter-CA";
                }else{
                    $lmscurso->filtro = "filter-VV";
                }
            });

            return view('perfil.index')->with([
                "categorias"=>$categorias,
                "productos"=>$productos,
                "listacursos"=>$listadoCursosAlumnos,
                "infoalumno"=>$infoAlumno
            ]);
        }
    }

    public function editarPerfil(Request $request){
        if(Session::get('userSession') == null){
            //redireccionar al login por que no se ha logeado
            return view('auth.login');
        }else{
            //acá en el backend validar los campos recibidos y hacer la misma validacion
            $reglas = array(
                "nombre" => "required",
                "apellido" => "required",
                "idAlumno"=>"required"
            );

            $msgValidacion = array(
                "required" => "El campo es requerido"
            );
            $validador = Validator::make($request->all(), $reglas, $msgValidacion);
            if($validador->fails()){
                return response()->json([
                    "ok"=>false,
                    "msg" => "errorValidacion",
                    "errores" => $validador->errors()
                ]);
            }
            //fecha y fono pueden ser NULL
            //hacer Update del usuario en los lugares correspondientes
            try{
                $objAlumno = new UserLms();
                $objAlumno->updateDetalleAlumno($request->idAlumno,$request->fono,$request->fecha,$request->nombre,$request->apellido);
                //actualizar el session con los nuevos datos
                $infoAlumnoSession = $objAlumno->getDetalleAlumno($request->idAlumno);
                $request->session()->put('userSession', $infoAlumnoSession);
                return response()->json([
                    'ok' => true
                ]);
            }catch (Exception $e){
                return response()->json([
                    'ok' => false
                ]);
            }
        }
    }

    public function actualizarSession(Request $request){
        if(Session::get('userSession') == null){
           //redireccionar al login por que no se ha logeado
           return view('auth.login');
        }else{
            $request->session()->get('userSession');
            $objUserLms = new UserLms();
            $infoAlumnoSession = $objUserLms->getDetalleAlumno($request->session()->get('userSession')->idAlumno);
            $request->session()->put('userSession', $infoAlumnoSession);
            return response()->json([
                'ok' => true
            ]);
        }
    }

    public function validarEmail($email){
        if($email != null){
            //acá buscar el email en la BD
            return response()->json([
                'ok' => true
            ]);
        }else{
            //error no viene correo retornar error para manejar en front
            return response()->json([
                'ok' => false
            ]);
        }
    }
}
