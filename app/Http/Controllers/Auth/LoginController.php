<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserLms;
use App\Models\Curso;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $reglas = array(
			"email" => "required",
			"password" => "required"
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

        //hacer login en lms3 con las credenciales
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //cambiar el provider
        Auth::shouldUse("usersLms");

        if(Auth::attempt($credentials)) {
            $is = $request->session()->regenerate();
            //antes de eso traer la data de la tblDetalleAlumno
            $objUserLms = new UserLms();
            $infoAlumnoSession = $objUserLms->getDetalleAlumno(Auth::user()->idAlumno);
            $request->session()->put('userSession', $infoAlumnoSession);
            return response()->json([
                'ok' => true,
                "alumno"=>$infoAlumnoSession
            ]);
        }else{
            return response()->json([
                'ok' => false,
            ]);
        }
    }

    //registro de un usuario
    public function registroUsuario(Request $request){
        //acá en el backend validar los campos recibidos y hacer la misma validacion
        $reglas = array(
			"nombre" => "required",
			"apellido" => "required",
            "email" => "required|email",
            "emailConfirmacion" => "required|email",
            "password" => "required",
            "passwordConfirmacion" => "required"
		);

		$msgValidacion = array(
            "required" => "El campo es requerido",
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        );
		$validador = Validator::make($request->all(), $reglas, $msgValidacion);
		if($validador->fails()){
			return response()->json([
                "ok"=>false,
				"msg" => "errorValidacion",
				"errores" => $validador->errors()
			]);
		}
        //ahora al validar que si llegaron los campos validar que no estén vacios
        if($request->nombre == "" || $request->apellido == "" || $request->email == "" || $request->emailConfirmacion == "" || $request->password == "" || $request->passwordConfirmacion == ""){
            return response()->json([
                "ok"=>false,
				"msg" => "errorValidacion empty values",
				"errores" => []
			]);
        }
        if($request->email != $request->emailConfirmacion){
            return response()->json([
                "ok"=>false,
				"msg" => "errorValidacion email match error",
				"errores" => []
			]);
        }
        if($request->password != $request->passwordConfirmacion){
            return response()->json([
                "ok"=>false,
				"msg" => "errorValidacion pwd match error",
				"errores" => []
			]);
        }

        $objAlumno = new UserLms();
        //acá llega si no hay ningun error de validacion entonces insertar al alumno en la tblAlumno si ya no existe y en la tblDetalleAlumno y en la tblAlumnoxCampus
        $usuarioDB = $objAlumno->getInfoUsuarioByEmail($request->email);
        if ($usuarioDB){
            return response()->json([
                'ok' => false,
                'msg' => "Correo ya existe",
            ]);
        }
        //acá el usuario no existe insertar su detalle y información
        $email = $request->email;
        $password = $request->password;
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $fecnacimiento = $request->fechaNacimiento;

        $idAlumno = $objAlumno->getRegistroUsuarioNuevo($email, $password, $nombre, $apellido, $fecnacimiento,null);

        return response()->json([
            'ok' => $idAlumno != null ? true : false,
            'idAlumno'=> $idAlumno
        ]);
    }


    /**
     * Método que ingresa datos del usuario para logear y redigir a la ruta lms
     *
     * @param idCurso,idAlumno
     * @return  url
     * @author Victor Curilao
     **/
    public function loginSuplantar($idCurso, $idAlumno)
    {
        if(Session::get('userSession') == null || Session::get('userSession')->idAlumno != $idAlumno ){
            //redireccionar al login por que no se ha logeado
            return redirect('/');
        }

        $token = csrf_token();
        //ingresa los datos a login externo
        $objUser = new UserLms();
        $ingresoUser = $objUser->insertLoginExterno($idAlumno, $idCurso, $token);

        $objCurso = new Curso();
        $getCurso = $objCurso->getCampusById($idCurso);

        // llog($idAlumno, $idCurso, $token, auth()->user()->idAlumno,$getCurso->dominio);
        //* redirige a la pa de login


        switch ($_SERVER["HTTP_HOST"]) {
            case "sasi.cl":
                $dominioMain = "https://" . ($getCurso->dominio !=='' ? $getCurso->dominio : 'campusvgroup') . ".campusvgroup.cl";
                break;
            case "qa.sasi.cl":
                $dominioMain = "https://qa.campusvgroup.cl";
                break;
            case "laravel-sasi-qa.vgroup.cl":
                $dominioMain = "http://qa.campusvgroup.cl";
                break;
            case "sasi-laravel.test":
                $dominioMain = "http://lms3.test";
                break;
            default:
                $dominioMain = "https://" . ($getCurso->dominio !=='' ? $getCurso->dominio : 'campusvgroup') . ".campusvgroup.cl";
                break;
        }

        // llog($dominioMain, $_SERVER["HTTP_HOST"]);
        return redirect( $dominioMain . '/login-suplantacion-alumno/' . $idCurso . '/' . $idAlumno . '/' . $token);
    }

}
