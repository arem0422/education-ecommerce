<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsoCupon extends Model
{
    protected $table = 'uso_cupon';
	protected $primaryKey = 'id';

    public static function getUsoGlobalCupon($id){
		$usos = DB::table('uso_cupon')
			->where('idCupon', $id)
            ->where('activo', 1)
			->count();

		return $usos;
	}
}
