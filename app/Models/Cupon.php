<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cupon extends Model{

	protected $table = 'cupons';
	protected $primaryKey = 'id';

	//get cupon by id
	public static function getCuponById($id){
		$product = DB::table('cupons')
			->where('id', $id)
			->first();
		return $product;
	}
    //get cupon by cupon name
	public function getCuponByCode($code){
		$product = DB::table('cupons')
			->where('codigo', $code)
			->first();
		if(!isset($product)){
			$product = DB::table('cupons')
			->where('codigo', '#'. $code)
			->first();
		}
		if(!isset($product) && substr($code, 0, 1) == '#'){
			$product = DB::table('cupons')
			->where('codigo', substr($code, 1, strlen($code)-1))
			->first();
		}
		return $product;
	}
	public static function getCuponesAutomaticos(){
		$product = DB::table('cupons')
			->where('automatico', 1)
			->get();
		return $product;
	}

}
