<?php

namespace App\Http\Controllers;

use App\Pagobotones;
use App\WebpayPlusModel;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use DB;

class WebpayPlusController extends Controller
{
    public function __construct(){
        \Transbank\Webpay\WebpayPlus::configureForProduction('597036044446', 'b230cca3-522d-4cd6-b08f-87251a034c64');
        //$transaction = new Transaction();
        /*
        if (app()->environment('production')) {
            \Transbank\Webpay\WebpayPlus::configureForProduction('597036044446', 'b230cca3-522d-4cd6-b08f-87251a034c64');
        } else {
            WebpayPlus::configureForTesting();
            SDK Versión 2.x
            El SDK apunta por defecto al ambiente de pruebas, no es necesario configurar lo siguiente
            \Transbank\Webpay\WebpayPlus::configureForProduction('597036044446', 'b230cca3-522d-4cd6-b08f-87251a034c64');

            Si deseas apuntar a producción:
            \Transbank\Webpay\WebpayPlus::configureForProduction('597036044446', 'b230cca3-522d-4cd6-b08f-87251a034c64');
        }*/
    }


    public function createdTransaction(Request $request)
    {
        $objPagoBotones = new Pagobotones();
        $botonPago = $objPagoBotones->getBotonById($request->IdBotonPago);
        $returnUrl = url()->to("webpayplus/returnUrl");
        // session()->put("urlMain", $request->main_domain);
        $oc = str_random(20);
        $resp = (new Transaction)->create($oc, $botonPago->IdBotonPago, $botonPago->MontoPago, $returnUrl);
        // add registro en DB
        WebpayPlusModel::insertTransaction($this->_geDataWebpayPlus($botonPago, $oc, $resp->token));

        return view('webpayplus/transaction_created_autosubmit', ["response" => $resp]);
    }

    public function commitTransaction(Request $request)
    {

        $token = null;
        $req = $request->except('_token');
        if(isset($req["token_ws"])){

            $token = $req["token_ws"];
            $resp = (new Transaction)->commit($token);
            $codPago = $resp->buyOrder;
            // Update transaccion
            WebpayPlusModel::setTransaction($codPago, $resp);
            if($resp->isApproved()){
                // transaccion aprobada
                WebpayPlusModel::setStatusPago($codPago, 'Pagado');
            } else {
                // transaccion rechazada
                WebpayPlusModel::setStatusPago($codPago, 'Rechazado');
            }


        } elseif (isset($req["TBK_TOKEN"])){
            // transaccion anulada
            $token = $req["TBK_TOKEN"];
            $resp = (new Transaction)->status($token);
            // transaccion rechazada
            WebpayPlusModel::setStatusPago($resp->buyOrder, 'Rechazado');

            // redirige a la página de rechazo o fracaso
            dd("Pago Rechazado");
        }

        // redirige a la pagina de renderizacion del resultado
        dd("Pago ". json_encode($resp->isApproved()));
    }


    // public function showRefund()
    // {
    //     return view('webpayplus/refund');
    // }

    // public function refundTransaction(Request $request)
    // {
    //     $req = $request->except('_token');

    //     $resp = (new Transaction)->refund($req["token"], $req["amount"]);

    //     return view('webpayplus/refund_success', ["resp" => $resp]);
    // }

    // public function getTransactionStatus(Request $request)
    // {
    //     $req = $request->except('_token');
    //     $token = $req["token"];

    //     $resp = (new Transaction)->status($token);

    //     return view('webpayplus/transaction_status', ["resp" => $resp, "req" => $req]);
    // }

    private function _geDataWebpayPlus($botonPago, $oc, $token)
    {
        return [
            "idBotonPago" => $botonPago->IdBotonPago,
            "oc" => $oc,
            "token" => $token,
        ];
    }
}
