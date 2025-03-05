<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class AlumnoxCurso extends Model {

    /**
     * The database connection used by the model.
     *
     * @var string
     */
    protected $connection = 'lms3';

    /**
     * Método que busca si el alumno se encuentra en el curso
     *
     * @param idCurso
     * @return get
     * @author José Vargas
     * */
    public function searchAlumnoxCurso($idCurso,$idAlumno) {
        $get = DB::connection('lms3')->table('tblAlumnoxCurso')
                ->join('tblCurso', 'tblCurso.idCurso', '=', 'tblAlumnoxCurso.idCurso')
                ->where('tblAlumnoxCurso.idAlumno', $idAlumno)
                ->where('tblAlumnoxCurso.idCurso', $idCurso)
                ->where('tblAlumnoxCurso.rol', 1)
                ->where('tblAlumnoxCurso.estadoCurso','!=', 0)
                ->get()
                ->first();

        return $get;
    }

  

}
