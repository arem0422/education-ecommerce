<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebpayTransaction extends Model
{
    use HasFactory;

    protected $table = 'webapay_transactions';

    public static function insertTransactionWebpay($pagoData, $id_compra)
    {
        try {
            if (isset($pagoData->paymentTypeCode)) {
                DB::table("webapay_transactions")->insert([
                    "id_compra" => $id_compra,
                    "vci" => $pagoData->vci,
                    "amount" => $pagoData->amount,
                    "status" => $pagoData->status,
                    "balance" => $pagoData->balance,
                    "buy_order" => $pagoData->buyOrder,
                    "session_id" => $pagoData->sessionId,
                    "card_detail" => json_encode($pagoData->cardDetail),
                    "card_number" => $pagoData->cardNumber,
                    "response_code" => $pagoData->responseCode,
                    "accounting_date" => $pagoData->accountingDate,
                    "payment_type_code" => $pagoData->paymentTypeCode,
                    "transaction_date" => $pagoData->transactionDate,
                    "authorization_code" => $pagoData->authorizationCode,
                    "installments_amount" => $pagoData->installmentsAmount,
                    "installments_number" => $pagoData->installmentsNumber,
                ]);
            } else {
                llog("no es una venta con webpay", $pagoData);
            }
        } catch (\Throwable $th) {
            //throw $th;
            llog(getTryCatch($th), $pagoData);
        }
    }
}
