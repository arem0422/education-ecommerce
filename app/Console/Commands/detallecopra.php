<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class detallecopra extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:detalle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $compras = DB::select(DB::raw("call reporte_ventas_v2();"));
        DB::table("compras_detalle")->truncate();
        DB::table("payku_transactions")->truncate();
        DB::table("webapay_transactions")->truncate();
        DB::table("billing_details")->truncate();
        foreach ($compras as $key => $compra) {
            # code...
            $this->insertTransactionProducts($compra);
        }
        $compras2 = DB::table("compras")->get();
        foreach ($compras2 as $key => $compra) {
            # code...
            $this->insertTransactionWebpay($compra);
            $this->insertBillingDetails($compra);
        }
        dd("fin");
    }

    private function insertTransactionProducts($compra)
    {
        $producto = Product::find($compra->idProducto);
        DB::table("compras_detalle")->insert([
            'id_compra' => $compra->idCompra,
            'id_producto' => $compra->idProducto,
            'precio_venta' => (int)$compra->precioFinal,
            'precio_original' => (int)$producto->precio,
        ]);
        
    }
    private function insertBillingDetails($compra)
    {
        try {
            $dataGift = json_decode($compra->request_data, true);
            DB::table("billing_details")->insert([
                "id_compra" => $compra->id,
                "mail_buy" => $dataGift["mail_buy"],
                "name_buy" => $dataGift["name_buy"],
                "lastname_buy" => $dataGift["lastname_buy"],
                "document_buy" => $dataGift["document_buy"],
                "cel_buy" => $dataGift["cel_buy"],
            ]);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            dd(getTryCatch($th), $dataGift);
        }
    }
    private function insertTransactionWebpay($compra)
    {
        // Crea un array asociativo
        $pagoData = json_decode($compra->pago_data, true);
        // El objecto esta vacio
        if (is_countable($pagoData) && count($pagoData) > 0) {
            try {
                if (key_exists("paymentTypeCode", $pagoData)) {
                    DB::table("webapay_transactions")->insert([
                        "id_compra" => $compra->id,
                        "vci" => $pagoData["vci"],
                        "amount" => $pagoData["amount"],
                        "status" => $pagoData["status"],
                        "balance" => $pagoData["balance"],
                        "buy_order" => $pagoData["buyOrder"],
                        "session_id" => $pagoData["sessionId"],
                        "card_detail" => json_encode($pagoData['cardDetail']),
                        "card_number" => $pagoData["cardNumber"],
                        "response_code" => $pagoData["responseCode"],
                        "accounting_date" => $pagoData["accountingDate"],
                        "payment_type_code" => $pagoData["paymentTypeCode"],
                        "transaction_date" => $pagoData["transactionDate"],
                        "authorization_code" => $pagoData["authorizationCode"],
                        "installments_amount" => $pagoData["installmentsAmount"],
                        "installments_number" => $pagoData["installmentsNumber"],
                    ]);
                } elseif (key_exists("subscription_id", $pagoData)) {
                    DB::table("payku_transactions")->insert([
                        "id_compra" => $compra->idCompra,
                        "id_payku" => $pagoData["id"],
                        "subscription_id" => $pagoData["subscription_id"],
                    ]);
                } else {
                    //dd($pagoData);
                }
            } catch (\Throwable $th) {
                //throw $th;
                dd(getTryCatch($th), $pagoData);
            }
        }
    }
}
