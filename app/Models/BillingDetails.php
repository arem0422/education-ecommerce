<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BillingDetails extends Model
{
    use HasFactory;

    protected $table = 'billing_details';

    public static function insertBillingDetails($dataGift, $id_compra)
    {
        try {
            DB::table("billing_details")->insert([
                "id_compra" => $id_compra,
                "mail_buy" => $dataGift["mail_buy"],
                "name_buy" => $dataGift["name_buy"],
                "lastname_buy" => $dataGift["lastname_buy"],
                "document_buy" => $dataGift["document_buy"],
                "cel_buy" => $dataGift["cel_buy"],
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            llog(getTryCatch($th), $dataGift);
        }
    }
}
