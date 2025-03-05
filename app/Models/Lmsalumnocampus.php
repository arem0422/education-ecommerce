<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;


class Lmsalumnocampus extends Model
{
    use HasFactory;

    /**
     * The database connection used by the model.
     *
     * @var string
     */
    protected $connection = 'lms3';

    /**
     * Método que crea un nuevo usuario con email.
     *
     * @param $email, $password, $nombre, $apellido, $fecnacimiento
     * @return idAlumno
     * @author Anthony Escalona
     **/
    public function RegistroUsuarioNuevo($email, $password, $nombre, $apellido, $fecnacimiento){

        function getDocumentoRandom(){
                $uniqueDocumento = "";
                $existe = false;
                do {
                    $uniqueDocumento = getUniqueId(15);
                    $existe = DB::connection('lms3')->table('tblAlumno')->where('numeroDocumento', $uniqueDocumento)->count() > 0 ? true : false;
                } while ($existe);
                return $uniqueDocumento;
        }

        function getUniqueId($length = 15, $pool = ""){
            if ($pool == "") {
                //$pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $pool = "0123456789";
            }
            mt_srand((float) microtime() * 1000000);
            $unique_id = "";
            for ($index = 0; $index < $length; $index++) {
                $unique_id .= substr($pool, (mt_rand() % (strlen($pool))), 1);
            }
            return ($unique_id);
        }

        DB::beginTransaction();
        $idAlumno = DB::connection('lms3')->table('tblAlumno')
        ->insertGetId(array(
            'email'=>$email,
            'emailVerificado'=>0,
            'tipoDocumento' => 1,
            'numeroDocumento' => getDocumentoRandom(),
            'password'=>Hash::make($password),

        ));
        DB::connection('lms3')->table('tblDetalleAlumno')
        ->insert(array(
            'idAlumno' =>$idAlumno,
            'nombre'=>$nombre,
            'apellido'=>$apellido,
            'sexo'=>0,
            'fecha_nacimiento'=>$fecnacimiento ? $fecnacimiento: "2022/11/02",
            'idEmpresa' => 1,
            'idDistrito'=>1,
            'imgPerfil'=>"https://static.vgroup.cl/2022/06/VGROUP/perfil_image_avatar.jpg"

        ));

        DB::connection('lms3')->table('tblAlumnoxCampus')
        ->insert([
            'idAlumno' => $idAlumno,
            'idCampus' => 3,
            'perfil' => 1,
            'vigente' => 1
        ]);

    DB::commit();

    return $idAlumno;
}
}
