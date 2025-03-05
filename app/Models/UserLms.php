<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserLms extends \TCG\Voyager\Models\User{ use HasApiTokens, HasFactory, Notifiable;

    /**
     * The database connection used by the model.
     *
     * @var string
     */
    protected $connection = 'lms3';

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'tblAlumno';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDetalleAlumno($idAlumno){
		$infoAlumno = DB::connection('lms3')->table('tblDetalleAlumno')
        ->join('tblAlumno', 'tblAlumno.idAlumno', '=', 'tblDetalleAlumno.idAlumno')
        ->where('tblDetalleAlumno.idAlumno', $idAlumno)
        ->get()
        ->first();
        return $infoAlumno;
    }

    /**
     * Método que busca al usuario segun el email.
     *
     * @param $rut
     * @return usuario
     * @author Jose Vargas
     **/
    public function getInfoUsuarioByEmail($email){
        $getUser = DB::connection('lms3')->table('tblAlumno')
            ->join('tblDetalleAlumno', 'tblAlumno.idAlumno', '=', 'tblDetalleAlumno.idAlumno')
            ->where('tblAlumno.email', $email)
            ->get()
            ->first();
        return $getUser;
    }

        /**
     * Método que crea un nuevo usuario con email.
     *
     * @param $email
     * @return usuario
     * @author Felipe Trujillo xd
     **/
    public function getRegistroUsuarioNuevo($email, $password, $nombre, $apellido, $fecnacimiento,$photoUrl){


            DB::connection('lms3')->beginTransaction();
            $idAlumno = DB::connection('lms3')->table('tblAlumno')->insertGetId(array(
                'email'=>$email,
                'emailVerificado'=>0,
                'tipoDocumento' => 1,
                'numeroDocumento' => $this->getDocumentoRandom(),
                'password'=>Hash::make($password),

            ));
            DB::connection('lms3')->table('tblDetalleAlumno')->insert(array(
                'idAlumno' =>$idAlumno,
                'nombre'=>$nombre,
                'apellido'=>$apellido,
                'sexo'=>0,
                'fecha_nacimiento'=>$fecnacimiento ?? null,
                'idEmpresa' => 1,
                'idDistrito'=>1,
                'cargo'=>'alumno',
                'imgPerfil'=>"https://static.vgroup.cl/2022/06/VGROUP/perfil_image_avatar.jpg"
            ));

             DB::connection('lms3')->commit();
        return $idAlumno;
    }

    public function updateDetalleAlumno($idAlumno,$fono,$fechaNacimiento,$nombre,$apellido){
        $updateR = DB::connection('lms3')->table('tblDetalleAlumno')
            ->where('tblDetalleAlumno.idAlumno', $idAlumno)
            ->update([
				'nombre' => $nombre,
                'apellido' => $apellido,
                'telefonoMovil' => $fono,
                'fecha_nacimiento' => $fechaNacimiento,
			]);
        return $updateR > 0 ? true : false;
    }

    /**
    * Método que ingresa un login externo a la bd para la suplantacion de la coordinadora como alumno
    *
    * @param  idAlumno,idCurso,token
    * @return insert
    * @author Victor Curilao
    **/
    public function insertLoginExterno($idAlumno,$idCurso,$token){

        $insert = DB::connection('lms3')->table('tblLoginExterno')
                    ->insert(array(
                        'idAlumno'=>$idAlumno,
                        'idCurso'=>$idCurso,
                        'token'=>$token
                    ));
        return $insert;
    }

    private function getDocumentoRandom(){
        $uniqueDocumento = "";
        $existe = false;
        do {
            $uniqueDocumento = $this->getUniqueId(15);
            $existe = DB::connection('lms3')->table('tblAlumno')->where('numeroDocumento', $uniqueDocumento)->count() > 0 ? true : false;
        } while ($existe);
        return $uniqueDocumento;
    }

    private function getUniqueId($length = 15, $pool = ""){
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

    public function cursosSugeridos($idAlumno,$idCurso){
        /* llog($idAlumno,$idCurso); */
        $sugeridos = DB::connection('lms3')->select('call Procedimiento_GetRecomendacion("'.$idAlumno.'", "'.$idCurso.'")');
        return $sugeridos;
    }
}
