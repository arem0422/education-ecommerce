<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;
class Lmsalumno extends Model
{
    use HasFactory;

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
    protected $table = 'tblAlumnoxCurso';


    /**
	 * Método que lista la información personal de un alumno en particular mediante el criterio de búsqueda:
	 * 1 para la búsqueda mediante idAlumno
	 * 2 para la búsqueda mediante email
	 *
	 * Si el registro se encontró retorna un objeto, en caso contrario retorna NULL
	 *
	 * @param $idAlumno
	 * @return stdArray | NULL
	 * @author Cristian Canales
	 * @replaceBy API
	 **/
	public function getInfoAlumnoByParam($mail){

		$infoAlumno = DB::connection('lms3')->table('tblAlumno')
					->select(DB::raw('tblAlumno.*, tblDetalleAlumno.*, tblEmpresa.*, tblPais.nombrePais, tblRegion.nombreRegion, tblComuna.nombreComuna'))
					->join('tblDetalleAlumno', 'tblDetalleAlumno.idAlumno', '=', 'tblAlumno.idAlumno')
					->join('tblEmpresa', 'tblEmpresa.idEmpresa', '=', 'tblDetalleAlumno.idEmpresa')
					->join('tblPais', 'tblPais.idPais', '=', 'tblDetalleAlumno.idPais')
					->join('tblRegion', 'tblRegion.idRegion', '=', 'tblDetalleAlumno.idRegion')
					->join('tblComuna', 'tblComuna.idComuna', '=', 'tblDetalleAlumno.idComuna')
					->where('tblAlumno.email', $mail)
					->where('tblAlumno.activo', 1)
					->first();
		return $infoAlumno;
	}

     /**
	 * Método que lista la información personal de un alumno en particular mediante el criterio de búsqueda:
	 * 1 para la búsqueda mediante idAlumno
	 * 2 para la búsqueda mediante email
	 *
	 * Si el registro se encontró retorna un objeto, en caso contrario retorna NULL
	 *
	 * @param $idAlumno
	 * @return stdArray | NULL
	 * @author Cristian Canales
	 * @replaceBy API
	 **/
	public function getInfoAlumnoxCursoByParam($idAlumno){

		$infoAlumnoxCurso = DB::connection('lms3')->table('tblAlumnoxCurso')
		            ->select(DB::raw('tblAlumnoxCurso.*,tblCurso.tituloCurso, tblDetalleCurso.imgThumbnailLow as imgPortada'))
					->join('tblCurso', 'tblCurso.idCurso', '=', 'tblAlumnoxCurso.idCurso')
                    ->join('tblDetalleCurso', 'tblDetalleCurso.idCurso', '=', 'tblAlumnoxCurso.idCurso')
					->where('tblAlumnoxCurso.idAlumno', $idAlumno)
                    ->where('tblAlumnoxCurso.estadoCurso', 1)
                    ->where('tblDetalleCurso.subcribe', 1)
                    ->orderBy('tblAlumnoxCurso.created_at', 'desc')
					->get();
		return $infoAlumnoxCurso;
	}


	/**
	 * Método que lista la información personal de un alumno en particular mediante el criterio de búsqueda:
	 * 1 para la búsqueda mediante idAlumno
	 * 2 para la búsqueda mediante email
	 *
	 * Si el registro se encontró retorna un objeto, en caso contrario retorna NULL
	 *
	 * @param $idAlumno
	 * @return stdArray | NULL
	 * @author Cristian Canales
	 * @replaceBy API
	 **/
	public function getProfesorCurso($idCurso){

		$infoAlumnoxCurso = DB::connection('lms3')->table('tblAlumnoxCurso')
		            ->select(DB::raw('tblDetalleAlumno.nombre, tblDetalleAlumno.apellido, tblDetalleAlumno.imgPerfil'))
					->where('tblAlumnoxCurso.idCurso', $idCurso)
					->where('tblAlumnoxCurso.rol', 2)
					->join('tblDetalleAlumno', 'tblDetalleAlumno.idAlumno', '=', 'tblAlumnoxCurso.idAlumno')
					->get()
					->first();
		return $infoAlumnoxCurso;
	}

	 /**
     * Metodo para matricular a un alumno en un curso determinado
     * A falta de definicion la regla aplicada será en caso que el alumno
     * ya se encuentre matriculado en el curso no ejecutará ninguna accion
     * lo mismo aplica para el campus.
     *
     * @author Héctor Vilches Flores
     * @param type $param
     * @return type
     */
    public function insertMatriculaAlumno($param)
    {
        // dd($param);
        $param['idCampus'] = DB::connection('lms3')->table('tblPrograma')
            ->select('tblPrograma.idCampus')
            ->join('tblCurso', 'tblCurso.idPrograma', 'tblPrograma.idPrograma')
            ->where('tblCurso.idCurso', $param['idCurso'])
            ->value('idCampus');



        DB::beginTransaction();
        try {
            /** En Caso que el alumno se encuentre registrado en el campus
             *  actualizará el campo vigente para queda habilitado.
             *  */
            $rowsAlumnoCampus = DB::connection('lms3')->table('tblAlumnoxCampus')
                ->where('idAlumno', $param['idAlumno'])
                ->where('idCampus', $param['idCampus'])
                ->where('vigente', 1)
                ->get()
                ->all();
            if (count($rowsAlumnoCampus) == 0) {
                // insert tblAlumnoxCampus
                $idAlumnoxCampus = DB::connection('lms3')->table('tblAlumnoxCampus')
                    ->insertGetId(array(
                        'idAlumno' => $param['idAlumno'],
                        'idCampus' => $param['idCampus'] != null ? $param['idCampus'] : 30, //Donde sacar este Dato
                        'perfil' => 1,
                        'vigente' => 1
                    ));


            } else {
                // Ante la posibilidad de que haya más de un registro vigente para el alumno en el campus, se deshabilitan todos y se deja el último registro como vigente. Si existe 1 sólo registro vigente actualmente se omite el procedimiento.
                if (count($rowsAlumnoCampus) > 1) {

                    $rowsADesactivar = (count($rowsAlumnoCampus) - 1);
                    for ($i = 0; $i < $rowsADesactivar; $i++) {

                        DB::connection('lms3')->table('tblAlumnoxCampus')
                            ->where('idAxC', $rowsAlumnoCampus[$i]->idAxC)
                            ->update([
                                'vigente' => 0
                            ]);
                    }
                }
            }
            /**
             * En caso que el alumno ya se encuentre matriculado no
             * realizará ninguna accion.
             */
            $rowsAlumnoCurso = DB::connection('lms3')->table('tblAlumnoxCurso')
                ->where('idAlumno', $param['idAlumno'])
                ->where('idCurso', $param['idCurso'])
                ->where('estadoCurso', '>', 0)
                ->get()
                ->all();

            if (count($rowsAlumnoCurso) == 0) {
                $idAxC = DB::connection('lms3')->table('tblAlumnoxCurso')
                    ->insertGetId(array(
                        'idAlumno' => $param['idAlumno'],
                        'idCurso' => $param['idCurso'],
                        'rol' => $param['rol'],
                        'esAlumnoSence' => $param['esSence'],
                        'codigoSence' => $param['codSence'],
                        'codigoCurso' => $param['senceNet'],
                        'origen' => $param['origen'],
                        'tagRetail' => $param['tagRetail'],
                        'estadoCurso' => 1,
                        'created_by' => 0 //->idAlumno
                    ));
                // dd($idAxC,$param);

                $detalleAlumno = DB::connection('lms3')->table('tblDetalleAlumno')
                    ->where('tblDetalleAlumno.idAlumno', $param['idAlumno'])
                    ->update([
                        'idEmpresa' => $param['idEmpresa']
                    ]);
            } else {

                // Ante la posibilidad de que haya más de un registro con estado > 0 para el alumno en el curso, se actualizan todos y se deja el último registro como disponible. Si existe 1 sólo registro vigente actualmente se omite el procedimiento.
                if (count($rowsAlumnoCurso) > 1) {

                    $rowsCursoADesactivar = (count($rowsAlumnoCurso) - 1);
                    for ($i = 0; $i < $rowsCursoADesactivar; $i++) {

                        DB::connection('lms3')->table('tblAlumnoxCampus')
                            ->where('idAxC', $rowsAlumnoCurso[$i]->idAlumnoxCurso)
                            ->update([
                                'vigente' => 0
                            ]);
                    }
                }

                $idAxC = DB::connection('lms3')->table('tblAlumnoxCurso')
                    ->where('idAlumno', $param['idAlumno'])
                    ->where('idCurso', $param['idCurso'])
                    ->pluck('idAlumnoxCurso')->first();
            }

        } catch (Exception $e) {
            DB::rollBack();
            return getErrorTryCatch($e);
        }
        DB::commit();
        return $idAxC;
    }


    public function getInfoAlumnoById($idAlumno){

        return DB::connection('lms3')->table('tblAlumno')
            ->join('tblDetalleAlumno', 'tblDetalleAlumno.idAlumno', '=', 'tblAlumno.idAlumno')
            ->where('tblAlumno.email', $idAlumno)
            ->get()
            ->first();
    }

    public function getNombreCursolms($idCurso){

        return DB::connection('lms3')->table('tblCurso')
            ->select('tblDetalleCurso.idCurso', 'tblDetalleCurso.imgThumbnailLow', 'tblCurso.tituloCurso' )
            ->join('tblDetalleCurso', 'tblDetalleCurso.idCurso', '=', 'tblCurso.idCurso')
            ->where('tblDetalleCurso.idCurso', $idCurso)
            ->get()
            ->first();

    }

    public function cargarSuscripcionSasi($idAlumno, $tagRetail, $fechaExpiracion){

        $cargarSuscripcion = DB::connection('lms3')->select(DB::raw("call cargarSuscripcion ($idAlumno ,'$tagRetail',0,'$fechaExpiracion')"));

        return $cargarSuscripcion;

        //Se listan los cursos sasi

    }



}
