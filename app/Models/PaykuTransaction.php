<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PaykuTransaction extends Model
{
    use HasFactory;

    protected $table = 'payku_transactions';

    public static function insertTransactionWebpay($compra)
    {
        // Verifica si la propiedad pago_data existe en el objeto $compra
        if (property_exists($compra, 'pago_data')) {
            // Decodifica la propiedad pago_data a un array asociativo
            $pagoData = json_decode($compra->pago_data, true);

            // Verifica si el array $pagoData no está vacío y contiene "subscription_id"
            if (is_array($pagoData) && isset($pagoData["subscription_id"])) {
                try {
                    DB::table("payku_transactions")->insert([
                        "id_compra" => $compra->idCompra,
                        "id_payku" => $pagoData["id"],
                        "subscription_id" => $pagoData["subscription_id"],
                    ]);
                } catch (\Throwable $th) {
                    // Manejo de errores
                    dd(getTryCatch($th), $pagoData);
                }
            } else {
                // Lógica de manejo si el array $pagoData está vacío o no contiene "subscription_id"
                dd(getTryCatch(new \Exception("PagoData vacío o no contiene subscription_id")), $pagoData);
            }
        } else {
            // Lógica de manejo si la propiedad pago_data no existe en $compra
            dd(getTryCatch(new \Exception("Propiedad pago_data no encontrada en el objeto")), $compra);
        }
    }
}
