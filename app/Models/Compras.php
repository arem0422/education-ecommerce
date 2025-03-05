<?php
namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model {

    use HasFactory;

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'compras';

    public function getOrdenByNumero($n_orden){
        return DB::table('compras')
            ->where('n_orden', '=' ,$n_orden)
            ->latest('id')
            ->first();
    }

	public function crearNuevaOrden($params){

		DB::beginTransaction();
        $orden = DB::table('compras')
        ->insertGetId(array(
            'n_orden'=>$params->n_orden,
            'estatus' => $params->estatus,
            'tipo_orden' => $params->tipo_orden,
            'productos'=>$params->productos,
            'precios'=>$params->precios,
			'para_regalo' => $params->para_regalo,
			'id_comprador' => $params->id_comprador,
			'total_compra' => $params->total_compra,
            'request_data' => $params->request_data,
			'id_cupon' => $params->id_cupon,
			'gift_data' => $params->gift_data,
			'bf_data' => $params->bf_data,
			'pago_data' => $params->pago_data,
            'escla' => $params->escla,
        ));
		DB::commit();
		return $orden;
	}

    public function insertToken($registroCompra, $token){
        //
        $insertToken = DB::table('compras')
            ->where('id', $registroCompra)
            ->update([
				'token' => $token
			]);
        return ($insertToken > 0 ? 'ok' : 'error');
    }

    public function updateStatusOrden($buyOrder, $params){

        if(isset($params["estatus"]) && $params["estatus"] === "Procesada"){

            $compraCupon = DB::table('compras')
                ->where('n_orden', $buyOrder)
                ->first();

            $countCupon = DB::table('uso_cupon')
                ->where('idCompra', $compraCupon->id)
                ->where('activo', 1)
                ->where('idCupon', $compraCupon->id_cupon)
                ->count();

            if($countCupon == 0 && isset($compraCupon->id_cupon)){
                DB::table('uso_cupon')
                ->insert([
                    "idCupon" => $compraCupon->id_cupon,
                    "idUsuario" => $compraCupon->id_comprador,
                    "idCompra" => $compraCupon->id,
                    "activo" => 1
                ]);
            }
        }

        $updateData = DB::table('compras')
        ->where('n_orden', $buyOrder)
        ->update($params);

        return ($updateData > 0 ? 'ok' : 'error');
    }

    public function getLast(){
        return DB::table('compras')
            ->latest('id')->first();
    }

    public function getComprasByIdComprador($idComprador){
        return DB::table('compras')
            ->where('id_comprador', $idComprador)
            ->get()
            ->all();
    }

    public function updateRespuestaApi($id,$res){
        $updateData = DB::table('compras')
        ->where('id', $id)
        ->update(['responseApiLms3' => $res]);
    }
}

?>
