<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Product;
use DB;

class CompraDetalle extends Model
{
    use HasFactory;

    protected $table = 'compras_detalle';

    public static function insertTransactionProducts($params)
    {
        try {
                DB::table("compras_detalle")->insert([
                'id_compra' => $params->id_compra,
                'id_producto' => $params->id_producto,
                'precio_venta' => (int)$params->precio_venta,
                'precio_original' => (int)$params->precio_original,
                ]);    
            } catch (\Throwable $th) {
                //throw $th;
                dd(getTryCatch($th), $params);
            }
    }
}