<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Producto extends Model{

    protected $table = 'products';
    protected $primaryKey = 'id';

     /**
	 * Método que recibe un idlms y trae el producto que tiene ese ID
	 *
	 * @param $idPregunta
	 * @return array stdArray | empty
	 * @author José Vargas
	 **/
	public function getProductoDbCarrito($idlms,$id){

		$product = DB::table('products')
            ->select(DB::raw('products.precio'))
			->where('id_lms', $idlms)
			->where('estatus_id', 1)
            ->where('id', $id)
			->get()
			->first();

		return isset($product) ? $product->precio : null;
	}
}

?>
