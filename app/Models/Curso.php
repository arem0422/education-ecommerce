<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Curso extends Model {

    /**
     * The database connection used by the model.
     *
     * @var string
     */
    protected $connection = 'lms3';

    /**
     * Método que obtiene el campus segun el id de curso
     *
     * @param idCurso
     * @return get
     * @author Victor Curilao
     * */
    public function getCampusById($idCurso) {

        $get = DB::connection('lms3')->table('tblCurso')
                ->join('tblPrograma', 'tblCurso.idPrograma', '=', 'tblPrograma.idPrograma')
                ->join('tblCampus', 'tblCampus.idCampus', '=', 'tblPrograma.idCampus')
                ->where('tblCurso.idCurso', $idCurso)
                ->select('tblCampus.idCampus as idCampus', 
                        'tblCampus.titulo as titulo', 
                        'tblCampus.subDominio as dominio',
                        'tblCampus.numMaxCursosReprobados',
                        'tblCampus.emailCoordinadora')
                ->get()
                ->first();

        return $get;
    }

    public function getIdCursoLms($idCursoSasi){
        return DB::table('products')
            ->select('products.id_lms')
            ->where('id', $idCursoSasi)
            ->get()
            ->first();
    }

    public function getPlantilla($numPlantilla){
        return DB::table('plantilla_emails')
            ->where('idPlantilla', $numPlantilla)
            ->get()
            ->first();

    }


    public function getTumbnailLow($idCurso){
        $data =  DB::connection('lms3')->table('tblDetalleCurso')
            ->select('tblDetalleCurso.imgThumbnailLow')
            ->where('tblDetalleCurso.idCurso', $idCurso)
            ->get()
            ->first();
        return $data->imgThumbnailLow;
    }

  

}
