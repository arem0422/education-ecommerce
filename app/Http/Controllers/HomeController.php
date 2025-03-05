<?php

namespace App\Http\Controllers;

use App\Cupon;
use App\Banner;
use App\Compra;
use App\Product;
use App\Models\Curso;
use App\Mail\SendMail;
use App\Newslettersub;
use App\Models\UserLms;
use App\Models\Compras;
use App\Models\UsoCupon;
use App\Models\Producto;
use App\Models\Lmsalumno;
use App\Mail\SuscribeMail;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\AlumnoxCurso;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Models\Lmsalumnocampus;
use TCG\Voyager\Models\Category;
use Transbank\Webpay\WebpayPlus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Cupon as ModelsCupon;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Session;
use Transbank\Webpay\WebpayPlus\Transaction;
use Illuminate\Contracts\Routing\UrlRoutable;
use Validator;
use Exception;
use stdClass;
use Throwable;
use App\Models\CompraDetalle;
use App\Models\BillingDetails;
use App\Models\WebpayTransaction;

class HomeController extends Controller
{

    public $objLmsalumno;
    public $objCompras;
    public $objCurso;
    public $objUserLms;
    public $objUserNew;
    public $UserLms;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->objLmsalumno = new Lmsalumno;
        $this->objCompras = new Compras;
        $this->objCurso = new Curso;
        $this->objUserLms = new UserLms;
        $this->objUserNew = new Lmsalumnocampus;
        $this->UserLms = new UserLms;

        if(env("TEST_COMPRA")){
            WebpayPlus::configureForIntegration('597055555532', '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');
        } else {
            WebpayPlus::configureForProduction('597048160909', '7d6906a4-6ff2-48ad-ba2f-5ae83facc2ad');
        }
    }

    /**
     *
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('mantencion');

        $banerhome = Banner::where('pagina', 1)->get();
        foreach ($banerhome as $baner) {
            if ($baner->imagen_desktop != "") {
                $baner->imagen_desktop = str_replace("\\", "/", $baner->imagen_desktop);
            }
            if ($baner->imagen_tablet != "") {
                $baner->imagen_movil = str_replace("\\", "/", $baner->imagen_movil);
            }
            if ($baner->imagen_movil != "") {
                $baner->imagen_movil = str_replace("\\", "/", $baner->imagen_movil);
            }
        }
        $categorias = Category::orderBy('id', 'DESC')->get();
        foreach ($categorias as $categoria) {
            $categoria->url = Str::replace(' ', '_', $categoria->name);
        }

        $productos = Product::where('estatus_id', 1)->where('categorias', 'like', "%Home%")->whereNotIn('id', [5, 46, 50, 51])->orderBy('created_at', 'DESC')->take(12)->get();
        $cursosproximos = Product::where('categorias', 'LIKE',  '%Proximamente%')->where('estatus_id', 1)->orderBy('created_at', 'DESC')->get();
        //return $cursosproximos;
        foreach ($productos as $producto) {
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio + 3000;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
        }
        return view('home')->with(
            [
                "banners" => $banerhome,
                "categorias" => $categorias,
                "productos" => $productos,
                "proximamente" => $cursosproximos
            ]
        );
    }


    public function newsletter(Request $request)
    {
        $existe = Newslettersub::where('email', $request->email)->get();
        if (count($existe) > 0) {
            $code = 300;
            $msg = "Disculpe Usted ya se encuentra Registrado";
        } else {
            $newslettersub = new Newslettersub;
            $newslettersub->nombre = $request->nombre;
            $newslettersub->email = $request->email;
            $newslettersub->estatus = 1;
            $newslettersub->save();

            $code = 200;
            $msg = "Usted ha sido registrado exitosamente";
        }

        return response()->json([
            "codigo" => $code,
            "msg" => $msg
        ]);
    }

    /**
     *    Función encargada de retornar la vista de empresas
     *    Retorna la vista con las distintas variables
     */
    public function empresas()
    {
        $banerEmpresas = Banner::where('pagina', 3)->get();
        foreach ($banerEmpresas as $baner) {
            if ($baner->imagen_desktop != "") {
                $baner->imagen_desktop = str_replace("\\", "/", $baner->imagen_desktop);
            }
            if ($baner->imagen_tablet != "") {
                $baner->imagen_movil = str_replace("\\", "/", $baner->imagen_movil);
            }
            if ($baner->imagen_movil != "") {
                $baner->imagen_movil = str_replace("\\", "/", $baner->imagen_movil);
            }
        }
        $categorias = Category::orderBy('id', 'DESC')->get();

        $productos = Product::where('categorias', 'like', "%Crecimiento_Profesional%")->orderBy('created_at', 'DESC')->get();
        foreach ($productos as $producto) {
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio + 3000;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
        }

        /*  return $banerEmpresas; */
        return view('empresas')->with(
            [
                "banners" => $banerEmpresas,
                "categorias" => $categorias,
                "productos" => $productos
            ]
        );
    }

    /**
     *    Función encargada de retornar la vista de cursos
     *    Retorna la vista con las distintas variables
     */
    public function cursos()
    {
        $categorias = Category::orderBy('id', 'DESC')->get();
        $productos = Product::whereNotIn('id', [5, 46, 50, 51])->where('estatus_id', 1)->orderBy('created_at', 'DESC')->get();
        foreach ($productos as $producto) {
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio + 3000;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
        }
        foreach ($categorias as $categoria) {
            $categoria->url = Str::replace(' ', '_', $categoria->name);
        }
        // dd(Auth::check());
        return view('cursos.index')->with([
            "categorias" => $categorias,
            "productos" => $productos,
            "prefilter" => "*"
        ]);
    }
    public function cursosNoCLA()
    {
        $categorias = Category::orderBy('id', 'DESC')->get();
        $productos = Product::whereNotIn('id', [5, 46, 50, 51])->where('estatus_id', 1)->where('categorias', 'not like', "%CLA%")->orderBy('created_at', 'DESC')->get();
        foreach ($productos as $producto) {
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio + 3000;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
        }
        foreach ($categorias as $categoria) {
            $categoria->url = Str::replace(' ', '_', $categoria->name);
        }
    }

    /**
     *    Función encargada de retornar la vista de el curso asociado al sku obtenido
     *    Retorna la vista con las distintas variables
     */
    public function detallecurso($sku)
    {
        $categorias = Category::orderBy('id', 'DESC')->get();
        $producto = Product::where('sku', $sku)->first();
        /* dd($producto); */
        $cats = json_decode($producto->categorias);
        $producto->categorias = $cats;
        $precio = $producto->precio + 3000;
        $producto->precio = number_format($producto->precio, 0, '.', '.');
        $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
        $producto->imagen_producto = str_replace("\\", "/", $producto->imagen_producto);
        $producto->imagen_profesor = str_replace("\\", "/", $producto->imagen_profesor);
        $idvideo = explode("/", $producto->url_video);
        $producto->url_video = "https://player.vimeo.com/video/" . $idvideo[3];
        return view('cursos.detalle_curso')->with([
            "categorias" => $categorias,
            "productos" => $producto
        ]);
    }

    /**
     *    Función encargada de retornar la vista de cursos filtrando por la categoria seleccionada
     *    Retorna la vista con las distintas variables
     */
    public function categorias($categoria)
    {
        $categorias = Category::orderBy('id', 'DESC')->get();
        $productos = Product::where('estatus_id', 1)->orderBy('created_at', 'DESC')->get();
        foreach ($productos as $producto) {
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio + 3000;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
        }
        foreach ($categorias as $cat) {
            $cat->url = Str::replace(' ', '_', $cat->name);
        }
        $categoria = Str::replace(' ', '_', $categoria);
        return view('cursos.index')->with([
            "categorias" => $categorias,
            "productos" => $productos,
            "prefilter" => $categoria
        ]);
    }

    /**
     *    Función encargada de retornar la vista de el carro
     *    Retorna la vista con las distintas variables y productos
     */
    public function cart()
    {
        $categorias = Category::orderBy('id', 'DESC')->get();
        $productos = Product::orderBy('created_at', 'DESC')->get();
        foreach ($productos as $producto) {
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio + 3000;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
            $producto->imagen_producto = str_replace("\\", "/", $producto->imagen_producto);
        }
        //return $productos[0]->categorias;
        return view('carrito.index')->with([
            "categorias" => $categorias,
            "productos" => $productos
        ]);
    }

    /**
     *    Función encargada de retornar la vista de checkout
     *    Retorna la vista con las distintas variables
     */
    public function finalcart()
    {
        $categorias = Category::orderBy('id', 'DESC')->get();
        $productos = Product::orderBy('created_at', 'DESC')->get();
        foreach ($productos as $producto) {
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio + 3000;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
            $producto->imagen_producto = str_replace("\\", "/", $producto->imagen_producto);
        }
        //return $productos[0]->categorias;
        return view('carrito.FinalizarCompra')->with([
            "categorias" => $categorias,
            "productos" => $productos
        ]);
    }

    /**
     *    Función encargada de inicar el proceso de compra
     *    Retorna la respuesta de la transacción
     */
    public function initCompra(Request $request)
    {
        //el procedimiento para iniciar una compra es el siguiente
        //1 validar todos los campos obligatorios
        $reglas = array(
            "name_buy" => "required",
            "lastname_buy" => "required",
            "mail_buy" => "required|email",
            "productsList" => "required",
            "document_buy" => "required",
            "cel_buy" => "required",
            "carrito" => "required",
        );
        $msgValidacion = array(
            "required" => "El campo es requerido",
            "email" => "Debes ingresar una dirección de email válida"
        );
        $validador = Validator::make($request->all(), $reglas, $msgValidacion);
        if ($validador->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "errorValidacion",
                "errores" => $validador->errors()
            ]);
        }

        //validar que los correos main sean correos válidos y además sean iguales
        if (!filter_var($request->mail_buy, FILTER_VALIDATE_EMAIL)) {
            //invalid email
            return response()->json([
                "ok" => false,
                "msg" => "errorValidacion",
                "errores" => ['mail_buy' => ["El correo es inválido"]]
            ]);
        }
        //ahora es el siguiente paso es validar el carrito ok json que envia el cliente con la BD y verificar que esté en orden, sino notificarle al usuario que debe eliminar el producto
        if ($request->carrito != null && $request->carrito != '[]') {
            $objProducto = new Producto();
            //array de id´s no disponibles por una alteracion en el precio
            $arrayIdNoDisponible = [];
            //array sin modificar just replace after
            $arrayNoModificado = json_decode($request->carrito);
            //se limpian los productos del array para pushear los correctos
            $arrayNoModificado->productos = [];
            //acá recorrer el array decodificado y accesible para manejar y editar y devolver arreglado
            $arrayModificable = json_decode($request->carrito)->productos;
            foreach ($arrayModificable as $key => $valor) {
                //traer el valor de BD de este producto por id $valor->idlms
                $precioDB = $objProducto->getProductoDbCarrito($valor->idlms, $valor->id);
                $precioJson = str_replace('$', '', $valor->precio);
                $precioJson = str_replace('.', '', $precioJson);
                $precioJson = str_replace(' ', '', $precioJson);
                //acá se comparan los precios y si no corresponden se saca del array
                if (floatval($precioJson) != $precioDB) {
                    array_push($arrayIdNoDisponible, $arrayModificable[$key]->idlms);
                    unset($arrayModificable[$key]);
                } else {
                    array_push($arrayNoModificado->productos, $valor);
                }
            }
            if (count($arrayIdNoDisponible) > 0) {
                $request->session()->put('carrito', json_encode($arrayNoModificado));
                return response()->json([
                    "ok" => false,
                    "carritoError" => true,
                    "xjs" => json_encode($arrayNoModificado),
                    "idsNoDisponible" => $arrayIdNoDisponible
                ]);
            }
        }

        //definimos las variables para comenzar el proceso de compra
        $fdata =  (object)[];
        $Productos = explode(",", $request->productsList);
        $carrito = [];
        $totalAmount = 0;
        $returnUrl = url()->to("webpayplus/returnUrl");

        foreach ($Productos as $producto) {
            $elemento = Product::find($producto);
            $totalAmount = (int)$totalAmount + (int)$elemento->precio;
            array_push($carrito, $elemento);
        }

        //creamos el numero de orden
        $a = $request->billing_type == "1" ? "F" : "B";
        $b = $request->gift == "1" ? "R" : "P";

        $lastOrder = Compras::orderby('created_at', 'desc')->first();
        $ultimaorden = $lastOrder ? $lastOrder->id : 0;
        $lastOrder = ($ultimaorden) + 1;
        $norden = $a . $b . "00000" . $lastOrder;
        $giftParam = null;
        $id_comprador = $request->document_buy;

        //genera las variables para meterlas en el json encode con el fkin formato necesario
        $idProductos = [];
        $montoProductos = [];
        if (isset($resp)) {
            foreach ($resp->idProdCompra as $idProd) {
                array_push($idProductos, $idProd["id"]);
            }
            foreach ($resp->montoProdCompra as $montoProd) {
                array_push($montoProductos, $montoProd["monto"]);
            }
        } else {
            foreach ($Productos as $producto) {
                $elemento = Product::find($producto);
                array_push($idProductos, $elemento->id);
                array_push($montoProductos, $elemento->precio);
            }
        }

        //procedemos a registrar la compra con estatus pendiente
        $newPurchase = (object)array(
            "n_orden" => $norden,
            "estatus" => "Pendiente",
            "productos" => json_encode(implode(",", $idProductos)),
            "precios" => json_encode(implode(",", $montoProductos)),
            // falta tipo_orden TODO
            "tipo_orden" => $request->billing_type == 1 ?: 0,
            "escla" => $request->escla,
            // falta check regalo
            "para_regalo" => $request->gift == 1 ? 1 : 0,
            "id_comprador" => $id_comprador,
            "total_compra" => $totalAmount,
            "id_cupon" => $request->cupon,
            "request_data" => json_encode($request->all()),
            "gift_data" => $request->gift == 1 ? json_encode($giftParam) : null,
            "bf_data" => json_encode($fdata),
            "pago_data" => json_encode($fdata),
        );
        $objCompras = new Compras;
        $registroCompraId = $objCompras->crearNuevaOrden($newPurchase);

        foreach ($Productos as $producto_id) {
            $producto = Product::find($producto_id);
            $params = new stdClass();
            $params->id_compra = $registroCompraId;
            $params->id_producto = $producto->id;
            $params->precio_venta = $totalAmount;
            $params->precio_original = (int)$producto->precio;
            // Registro en tabla detalle_compra
            CompraDetalle::insertTransactionProducts($params);
        }
        // Proceso para insertar detalle del comprador en tabla billing_details
        BillingDetails::insertBillingDetails($request->all(), $registroCompraId);

        if ($totalAmount != 0) {
            $response = (new Transaction)->create($norden, $id_comprador, $totalAmount, $returnUrl);

            if (!isset($response->token)) {
                return response()->json([
                    "ok" => false,
                    "msg" => "errorValidacion",
                    "errores" => [
                        'unknown_error' => "Error Desconocido"
                    ]
                ]);
                $objCompras->insertToken($registroCompraId, $response->token);
            }


            return response()->json([
                "msg" => "ok",
                "params" => $request,
                "response" => $response
            ]);
        } else {
            //return $request;
            $objCompras->insertToken($registroCompraId, "compra 0");
            $response = "compra 0";
            $datacompra =  $this->commitTransactionCero($request->all(), $norden);
            log::debug("compra 0");
            return response()->json([
                "msg" => "ok",
                "params" => $request->all(),
                "response" => $response,
                "registrocompra" => $datacompra,
                "norden" => $norden,
            ]);
        }
    }

    /**
     *    Función encargada de validar el proceso de pago con el fin de cambiar el estatus de la compra realizada
     *    basada en la respuesta de la transacción
     *    Retorna la respuesta de la transacción
     */
    public function commitTransaction(Request $request)
    {
        $token = null;
        $req["token_ws"] = $request->token_ws;
        $objCompras = new Compras;
        if (isset($req["token_ws"])) {
            $token = $req["token_ws"];

            $resp = (new Transaction)->commit($token);
            $buyOrder = $objCompras->getOrdenByNumero($resp->buyOrder);
            $isApproved = $resp->isApproved();
            // Registro en tabla webapay_transactions
            WebpayTransaction::insertTransactionWebpay($resp, $buyOrder->id);

            if ($isApproved) {
                //Se setea el estado de la orden como aprobada
                $params = array(
                    "token" => $token,
                    "estatus" => "Procesada",
                    "pago_data" => json_encode($resp),
                );
                $objCompras->updateStatusOrden($buyOrder->n_orden, $params);

                $this->insercionApiLms3($buyOrder);

                // transaccion aprobada
                return view("carrito.CompraExitosa", [
                    "procesada" => true,
                    "compra" => $buyOrder
                ]);
            } else {
                $params = array(
                    "estatus" => "Rechazada",
                    "pago_data" => json_encode($resp),
                );

                // transaccion rechazada
                $objCompras->updateStatusOrden($resp->buyOrder, $params);
                llog('transaccion rechazada');
                return view('carrito.CompraRechazada');
            }
        } elseif (isset($req["TBK_TOKEN"])) {
            $token = $req["TBK_TOKEN"];
            $resp = (new Transaction)->status($token);

            $params = array(
                "estatus" => "Cancelada",
                "pago_data" => json_encode($resp),
            );

            $objCompras->updateStatusOrden($resp->buyOrder, $params);

            return view('carrito.CompraRechazada');
        } else {
            return view('carrito.CompraRechazada');
        }

    }


    private function flujoCargaCursos($params_usuario, $buyOrder, $listaProductos, $es_suscripcion)
    {

        if ($es_suscripcion == true) {
            //TODO SUSCRIPCION
            return;
        }
        $objLmsalumno = new Lmsalumno;
        $arrayDataCurso = [];
        $nombreCursosArray = null;

        foreach ($listaProductos as $productoCurso) {
            $idCursoSasi = trim($productoCurso, '"');

            $idCursoLms = $this->objCurso->getIdCursoLms($idCursoSasi);
            $nombreCursoLms = $objLmsalumno->getNombreCursolms($idCursoLms->id_lms);

            $paramMatricula = array(
                'idCurso' => $idCursoLms->id_lms,
                'idAlumno' => $params_usuario->idAlumno,
                'rol' => 1,
                'esSence' => 2,
                'codSence' => '',
                'senceNet' => '',
                'idEmpresa' => 92,
                'origen' => 1,
                'tagRetail' => 'CompraSasiWeb: ' . $buyOrder->n_orden ?? "no pudo procesar",
            );

            $insertAlumno = $objLmsalumno->insertMatriculaAlumno($paramMatricula);
            $arrayDataCurso[] = ['idCursoSasi' => $idCursoSasi, 'idCursoLms' => $idCursoLms->id_lms, 'idAxC' => $insertAlumno];
            $nombreCursosArray[] = $nombreCursoLms->tituloCurso . '<br>';
        }
        return $nombreCursosArray;
    }

    private function enviarEmailsCompra($params_usuario, $params_usuario_to,  $compraSasi, $buyOrder, $es_regalo)
    {
        try {
            if (!$es_regalo) {
                Log::info("paso if no es regalo");

                $objPlantillaNoEsRegalo = $this->objCurso->getPlantilla($params_usuario->is_new == true ? 3 : 4);
                $html = $objPlantillaNoEsRegalo->htmlPlantilla;

                //Se limpia el array para obtener los nombres de cursos
                $stringCursos = implode(" ", $compraSasi);
                $html = str_replace("[nombre_recibe]", $params_usuario->name . ' ' . $params_usuario->lastname, $html);
                $html = str_replace("[listado_cursos]", $stringCursos, $html);
                $dataBoleta = null;
                if ($buyOrder->tipo_orden == 0 && $buyOrder->total_compra > 0) {
                    $dataBoleta = $this->generarBoletaFactura($buyOrder, $params_usuario);
                }
                $objCompras = new Compras;
                $params = [
                    "num_boleta" => $dataBoleta->number,
                    "url_boleta" => $dataBoleta->urlPdf
                ];
                $objCompras->updateStatusOrden($buyOrder->n_orden, $params);

                if (!is_null($dataBoleta)) {
                    $htmlboleta = "<a href='$dataBoleta->urlPdf'>Descarga tu boleta aquí</a>";
                    $html = str_replace("[url_boleta_factura]", $htmlboleta, $html);
                } else {
                    $html = str_replace("[url_boleta_factura]", " ", $html);
                }
                $paramEnvioEmail = [
                    "emailFrom" => $objPlantillaNoEsRegalo->emailFrom,
                    'subject' => $objPlantillaNoEsRegalo->subject,
                    'plantillaHtml' => $html
                ];

                Mail::to($params_usuario->email)->send(new SendMail($paramEnvioEmail));

                return true;
            } else {

                Log::info("paso if es regalo");

                //Se limpia el array para obtener los nombres de cursos
                $stringCursos = implode(" ", $compraSasi);

                $objPlantillaRegalo = $this->objCurso->getPlantilla($params_usuario_to->is_new ? 1 : 2);
                //Log::info("paso 0.1".json_encode($htmlRegalo));
                $htmlRegalo = $objPlantillaRegalo->htmlPlantilla;
                //$asuntoRegalo = $htmlRegalo->subject;
                $htmlRegalo = str_replace("[listado_cursos]", $stringCursos, $htmlRegalo);
                $htmlRegalo = str_replace("[nombre_regalo_from]", $params_usuario->name . ' ' . $params_usuario->lastname, $htmlRegalo);
                $htmlRegalo = str_replace("[nombre_recibe]", $params_usuario_to->name . ' ' . $params_usuario_to->lastname, $htmlRegalo);
                $htmlRegalo = str_replace("[mensaje_regalo]", $params_usuario_to->message, $htmlRegalo);
                //Log::info("paso 0.3");

                $paramEnvioEmail = [
                    "emailFrom" => $objPlantillaRegalo->emailFrom,
                    'subject' => $objPlantillaRegalo->subject,
                    'plantillaHtml' => $htmlRegalo
                ];

                //Log::info("paso 0.4");
                Mail::to($params_usuario_to->email)->send(new SendMail($paramEnvioEmail));
                //Log::info("paso 1");

                //Mail de Regalo con boleta factura
                $htmlRegaloGet = $this->objCurso->getPlantilla(5);
                Log::info("paso 2");

                $html = $htmlRegaloGet->htmlPlantilla;

                $html = str_replace("[nombre_regalo_from]", $params_usuario->name . ' ' . $params_usuario->lastname, $html);
                $html = str_replace("[nombre_recibe]", $params_usuario_to->name . ' ' . $params_usuario_to->lastname, $html);
                $html = str_replace("[listado_cursos]", $stringCursos, $html);

                $dataBoleta = null;
                //Log::info("paso 3");
                if ($buyOrder->tipo_orden == 0) {
                    $dataBoleta = $this->generarBoletaFactura($buyOrder, $params_usuario);
                }
                $objCompras = new Compras;
                $params = [
                    "num_boleta" => $dataBoleta->number,
                    "url_boleta" => $dataBoleta->urlPdf
                ];
                $objCompras->updateStatusOrden($buyOrder->n_orden, $params);

                if (!is_null($dataBoleta)) {
                    $htmlboleta = "<a href='$dataBoleta->urlPdf'>Descarga tu boleta aquí</a>";
                    $html = str_replace("[url_boleta_factura]", $htmlboleta, $html);
                } else {
                    $html = str_replace("[url_boleta_factura]", " ", $html);
                }

                $paramRegaloEnviado = [
                    'emailFrom' => $htmlRegaloGet->emailFrom,
                    'subject' => $htmlRegaloGet->subject ? "$htmlRegaloGet->subject" : "Regalo Sasi",
                    'plantillaHtml' => $html,
                ];



                Mail::to($params_usuario->email)->send(new SendMail($paramRegaloEnviado));

                return true;
            }
        } catch (Throwable $e) {

            Log::info("error regalo email:" . json_encode($e));
            return false;
        }
        return false;
    }

    public function guardarCarritoSesion(Request $request)
    {
        $reglas = array(
            "carrito" => "required"
        );

        $msgValidacion = array(
            "required" => "El campo es requerido"
        );

        $validador = Validator::make($request->all(), $reglas, $msgValidacion);

        if ($validador->fails()) {
            return response()->json([
                "ok" => false
            ]);
        }
        if ($request->carrito != null && $request->carrito != '[]') {
            $objProducto = new Producto();
            //array de id´s no disponibles por una alteracion en el precio
            $arrayIdNoDisponible = [];
            //array sin modificar just replace after
            $arrayNoModificado = json_decode($request->carrito);
            //se limpian los productos del array para pushear los correctos
            $arrayNoModificado->productos = [];
            //acá recorrer el array decodificado y accesible para manejar y editar y devolver arreglado
            $arrayModificable = json_decode($request->carrito)->productos;
            foreach ($arrayModificable as $key => $valor) {
                //traer el valor de BD de este producto por id $valor->idlms
                $precioDB = $objProducto->getProductoDbCarrito($valor->idlms, $valor->id);
                $precioJson = str_replace('$', '', $valor->precio);
                $precioJson = str_replace('.', '', $precioJson);
                $precioJson = str_replace(' ', '', $precioJson);
                //acá se comparan los precios y si no corresponden y ademas no es suscripción se saca del array
                if (floatval($precioJson) != $precioDB && !in_array($valor->id, [46, 50, 51])) {
                    array_push($arrayIdNoDisponible, $arrayModificable[$key]->idlms);
                    unset($arrayModificable[$key]);
                } else {
                    array_push($arrayNoModificado->productos, $valor);
                }
            }
            Log::info(json_encode($arrayNoModificado));
            $request->session()->put('carrito', json_encode($arrayNoModificado));
            return response()->json([
                "ok" => true,
                "xjs" => json_encode($arrayNoModificado),
                "idsNoDisponible" => $arrayIdNoDisponible
            ]);
        } else {
            return response()->json([
                "ok" => false,
                "xjs" => '[]'
            ]);
        }
    }

    public function informacion($informacion)
    {
        return view('informacion')->with(['section' => $informacion]);
    }

    /**
     *    Función encargada de retornar la vista de redirect para borrar el localStorage al usuario y la session en una compra exitosa, esto con el fin de mostrarle algo
     *    y setear la data
     *    Retorna la vista con las distintas variables
     */
    public function politicas()
    {
        return view('politicas-app');
    }

    public function redirectBlade()
    {
        session()->forget('carrito');

        return view('carrito.CompraExitosa');

    }

    /**
     *    Función encargada de retornar la vista de cajalosandes
     *    Retorna la vista con las distintas variables
     */
    public function cajalosandes()
    {
        $banerCajalosandes = Banner::where('pagina', 2)->get();
        foreach ($banerCajalosandes as $baner) {
            if ($baner->imagen_desktop != "") {
                $baner->imagen_desktop = str_replace("\\", "/", $baner->imagen_desktop);
            }
            if ($baner->imagen_tablet != "") {
                $baner->imagen_movil = str_replace("\\", "/", $baner->imagen_movil);
            }
            if ($baner->imagen_movil != "") {
                $baner->imagen_movil = str_replace("\\", "/", $baner->imagen_movil);
            }
        }
        $categorias = Category::orderBy('id', 'DESC')->get();

        $productos = Product::where('estatus_id',1)->orderBy('created_at', 'DESC')->get();

        foreach ($productos as $producto) {
            $cats = json_decode($producto->categorias);
            $producto->categorias = $cats;
            $precio = $producto->precio;
            $producto->precio = number_format($producto->precio, 0, '.', '.');
            $producto->precio_anterior = number_format($producto->precio_normal, 0, '.', '.');
            $producto->imgThumbnail = $producto->imagen_producto;
        }




        /*  return $banerCajalosandes; */
        return view('cajalosandes')->with(
            [
                "banners" => $banerCajalosandes,
                "categorias" => $categorias,
                "productos" => $productos

            ]
        );
    }

    /**
     *    Función encargada de validar si el usuario objetivo tiene el array de cursos que se le proporciona
     *    José Vargas
     */
    public function validarCarritoIdAlumno($idAlumno, $productosArray)
    {
        $objAlumnoxCurso = new AlumnoxCurso();
        $totalEncontrados = [];
        foreach ($productosArray as $producto) {
            $elemento = Product::find($producto);
            $find = $objAlumnoxCurso->searchAlumnoxCurso($elemento->id_lms, $idAlumno);
            if ($find != null) {
                array_push($totalEncontrados, $find);
            };
        }
        return $totalEncontrados;
    }

    public function historialCompras()
    {
        if (Session::get('userSession')) {
            //acá el usuario esta logeado por tanto
            $objCompras = new Compras();
            $registros = $objCompras->getComprasByIdComprador(Session::get('userSession')->idAlumno);

            foreach ($registros as &$registro) {
                //rq data
                $registro->request_data = json_decode($registro->request_data);
                if ($registro->request_data->carrito != null) {
                    $registro->request_data->carrito = json_decode($registro->request_data->carrito);
                }
                //pagodata
                $registro->pago_data = json_decode($registro->pago_data);
                if ($registro->pago_data->amount != null) {
                    $registro->pago_data->amount = number_format($registro->pago_data->amount, 0, '.', '.');
                }
            }

            return view('perfil.historialCompras')->with([
                "registros" => $registros
            ]);
            // return response()->json([
            //     "registros"=>$registros ?? []
            // ]);
        } else {
            //redireccionar al login por que no se ha logeado
            return view('auth.login');
        }
    }

    public function sasi_kids()
    {
        return view('sasi_kids');
    }

    public function notificaPagoRechazado(Request $req)
    {
        $req->session()->pull('idCompraSuscripcion', '');

        return view("carrito.CompraRechazada")->with('procesada', false);;
    }

    public function notificaPagoAceptado(Request $req)
    {
        // https://sasi.cl/notifica-pago-exitoso?subscription_id=sucd691acfb4ff10c4ebbd&id=16670712830549

        //creamos un arreglo con los datos retornados por payku
        $datos_sucripcion = array("subscription_id" => $req->subscription_id, "id" => $req->id);

        //obtenemos el id de la compra
        if ($req->idCompra && $req->pass = 'superadminreprocesar') {
            $idcompra = $req->idCompra;
        } else {
            $idcompra = $req->session()->get('idCompraSuscripcion') ??  135;
        }
        //obtenemos los datos de la compra pendiente
        $compra = Compras::find($idcompra);
        //validamos si el comprador existe en el lms
        $datoscomprador = json_decode($compra->request_data);
        $existe_lms = $this->objLmsalumno->getInfoAlumnoByParam($datoscomprador->mail_buy);

        //si el alumno ya se encuentra registrado en el lms procedemos a matricularlo en todos los cursos sasi
        if ($existe_lms) {
            $idAlumnolms = $existe_lms->idAlumno;
            $insertSuscripcion = $this->objLmsalumno->cargarSuscripcionSasi($idAlumnolms, "SuscripcionSasi", "2022/05/15");
        } else {
            //en caso de ser un alumno nuevo se registra y posterior a eso se matricula
            $insertSuscripcion = $this->objUserNew->RegistroUsuarioNuevo($datoscomprador->mail_buy, "123", $datoscomprador->name_buy, $datoscomprador->lastname_buy, $datoscomprador->bith_buy);
        }
        $dataBoleta = null;
        $Htmlboleta = "";
        $params_usuario = (object)[
            'email' => $datoscomprador->mail_buy,
            'name' => $datoscomprador->name_buy,
            'lastName' => $datoscomprador->lastname_buy,
        ];
        $buyOrder = $compra;

        if ($compra->tipo_orden == 0) { //boleta
            $dataBoleta = $this->generarBoletaFactura($buyOrder, $params_usuario);
            $Htmlboleta = "<a href='$dataBoleta->urlPdf'>Descarga tu boleta aquí</a>";
            $compra->num_boleta = $dataBoleta->number;
            $compra->url_boleta = $dataBoleta->urlPdf;
        } else {
            $compra->num_boleta = null;
            $compra->url_boleta = null;
        }

        $paramSuscribeEnviado = [
            'email' => $datoscomprador->mail_buy,
            'nombre' => $datoscomprador->name_buy,
            'htmlboleta' => $Htmlboleta,
            'emailFrom' => 'hola@sasi.cl',
        ];

        Mail::to($datoscomprador->mail_buy)->send(new SuscribeMail($paramSuscribeEnviado));


        $compra->pago_data = $datos_sucripcion;
        $compra->estatus = "Procesada";
        $compra->save();
        $req->session()->pull('idCompraSuscripcion', '');

        if ($req->query('subscription_id')) {
            return view("carrito.CompraExitosa", [
                "procesada" => true,
                "compra" => $compra
            ]);
        }
    }

    public function notificaPago($transaccion, $idtrans)
    {
        if (isset($transaccion)) {
            return view("carrito.CompraExitosa");
        }
    }

    /**
     *    Función encargada de validar el proceso de pago con el fin de cambiar el estatus de la compra realizada
     *    basada en la respuesta de la transacción
     *    Retorna la respuesta de la transacción
     */
    function commitTransactionCero($request, $norden)
    {

        $objCompras = new Compras;
        $objLmsalumno = new Lmsalumno;
        $resp = ["Tipo_compra" => "Compra con cupon 100% descuento"];

        $params = array(
            "estatus" => "Procesada",
            "pago_data" => json_encode($resp),
        );
        $objCompras->updateStatusOrden($norden, $params);

        $buyOrder = $objCompras->getOrdenByNumero($norden);
        $listaProductos = explode(",", $buyOrder->productos);
        $dataRequest = json_decode($buyOrder->request_data);

        $respuesta = $this->insercionApiLms3($buyOrder);

        log::debug("respuesta incercion compra 0");
        log::debug($respuesta);
        //consumimos api de inserción lms

        return 200;
    }

    public function compraceroExitosa($norden)
    {
        //return $norden;
        return view("carrito.CompraExitosa", [
            "procesada" => true,
            "compra" => $norden
        ]);
    }

    public function getProductsList()
    {
        //CONSULTA A MODELO DE PRODUCTOSS IGUALES A LOS DEL CARRITO PARA MOSTRARLOS EN EL BUSCADOR
        //  $productosSearch = Product::whereNotIn('id', [5, 46, 50, 51])->where('estatus_id', 1)->where('categorias', 'not like', "%CLA%")->orderBy('created_at', 'DESC')->get();
        $productosSearch = Product::where('estatus_id', 1)->orderBy('created_at', 'DESC')->get();


        return response()->json($productosSearch);
    }

    public function politicasApp()
    {
        return view('politicas.politicas-app');
    }

    public function insercionApiLms3($buyOrder)
    {
        $objCompras = new Compras;
        $productosWixId = "";
        $productList = str_replace('"', '', $buyOrder->productos);
        $listaProductos = explode(",", $productList);
        $dataRequest = json_decode($buyOrder->request_data);

        foreach ($listaProductos as $elemento) {
            $id = $elemento;
            $idWixProd = Producto::find($id);
            if ($productosWixId != "") {
                $productosWixId =  $productosWixId . "," . $idWixProd->id_lms;
            } else {
                $productosWixId = $idWixProd->id_lms;
            }
        }

        //inscribimos al alumno en el curso

        // URL de destino
        $url = "https://api-lms.vgroup.cl/api/api_sasi_3";

        // Datos a enviar
        //$rutlimpio = preg_replace('/[\.-]./', '', $buyOrder->id_comprador);
        $rutlimpio = preg_replace('/[.\-]/', '', $buyOrder->id_comprador);
        $data = array(
            'nombre' => $dataRequest->name_buy,
            'apellido' => $dataRequest->lastname_buy,
            'cursos' => $productosWixId,
            'email' => $dataRequest->mail_buy,
            'monto' => $buyOrder->precios,
            'orden' => $buyOrder->n_orden,
            'rut' => $rutlimpio,
            'origen' => 2,
            'esCLA' => $buyOrder->escla,// 0 no es cla 1 es cla
        );

        log::debug("data a enviar a la api desde insercionApiLms3");
        log::debug($data);

        // Encabezados
        $headers = array(
            'Content-Type: application/json',
            'token: Vgroup2023:)'
        );
        try {
            // Inicializar cURL
            $ch = curl_init();
            // Configurar opciones de cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // Ejecutar la solicitud
            $response = curl_exec($ch);
            // Cerrar cURL
            curl_close($ch);
            // Mostrar la respuesta
            $objCompras->updateRespuestaApi($buyOrder->id, $response);

            log::debug("respuesta api");
            log::debug($response);
        } catch (\Throwable $th) {
            $objCompras->updateRespuestaApi($buyOrder->id, $th);
        }
    }

    public function validadorCla($rut){
        // URL de destino
        $url = "https://matriculaudd.vgroup.cl/tiene-beneficio/".$rut;

        try {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $data = json_decode($response, true);
            $codigo = $data['result']['code'];
            $mensaje = $data['result']['msg'];
            return response()->json([
                "codigo" => $codigo,
                "respueta"=>$mensaje
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "codigo" => 500,
                "respueta"=>$th
            ]);
        }


    }
}
