@extends('layouts.nav')
@push('cssOpcionales')
     {{-- <link rel="stylesheet" href="css/cursos/styleCursos.css">  --}}
    <link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito/producto.css') }}">
@endpush

@section('content')
    <style>
        .lds-ring {
            display: inline-block;
            position: relative;
            width: 20px;
            height: 20px;
        }
        .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 20px;
            height: 20px;
            margin: 5px;
            border: 4px solid #fff;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: #fff transparent transparent transparent;
        }
        .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
        }
        .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
        }
        .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
        }
        .btnProcesandoCompra{
            color:white;
            font-weight: bold;
        }
        .btnFinalizarCompra{
            color:black;
        }
        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .swal-modal{
            width: 600px;
        }
    </style>
    <br>
    @include('partials.modal_caja')
    <div class="row container-fluid mb-1 m-0 p-0">
        <div class="col-12 col-md-6 ms-0 ms-lg-5 ps-md-5" >
            <div class="row mt-3">
                <form id="buy_form" method="post" action="/StarBuy">
                    @csrf
                        <div class="col-12 m-0 p-0" id="formDatosUsuario">
                            <div class="row m-0 p-0">
                                <h1 class="fs-3 fw-bold">Datos de Usuario</h1>
                                <div class="col-6">
                                    <label for="" class="d-block fs-6 fw-bold mb-2 texto-productos">Nombre <p class="d-inline-block text-danger m-0">*</p></label>
                                    <input type="text" class="fs-6 w-100 d-inline-block rounded border-0 py-1 m-0 mb-0 ps-2" id="name_buy" name="name_buy" placeholder="Nombre">
                                    <p class="text-danger m-0 mb-2 fw-bold" id="name_buy_error" style="font-size:small;display: none">Este campo es requerido</p>
                                </div>
                                <div class="col-6">
                                    <label for="" class="d-block fs-6 fw-bold mb-2 texto-productos">Apellido <p class="d-inline-block text-danger m-0">*</p></label>
                                    <input type="text" class="fs-6 w-100 d-inline-block rounded border-0 py-1 m-0 mb-0 ps-2" id="lastname_buy" name="lastname_buy" placeholder="Apellido">
                                    <p class="text-danger m-0 mb-2 fw-bold" id="lastname_buy_error" style="font-size:small;display: none">Este campo es requerido</p>
                                </div>
                                <div class="col-12">
                                    <label for="" class="d-block fs-6 fw-bold mb-2 texto-productos">Correo electrónico <p class="d-inline-block text-danger m-0">*</p></label>
                                    <input type="mail" id="originalMailFinalizarCompra" class="fs-6 w-100 d-inline-block rounded border-0 py-1 m-0 mb-0 ps-2" name="mail_buy" placeholder="ejemplo@mail.com">
                                    <p class="text-danger m-0 mb-2 fw-bold" id="mail_buy_error" style="font-size:small;display: none">Este campo es requerido</p>
                                    <p class="emailvalidocorreomain text-danger fs-8 fw-bold mb-2" style="display: none">Ingresar un email válido</p>
                                </div>
                                <div class="col-12">
                                    <label for="" class="d-block fs-6 fw-bold mb-2 texto-productos">Numero teléfonico <p class="d-inline-block text-danger m-0">*</p></label>
                                    <input type="number" id="telcompra" name="cel_buy" class="fs-6 w-100 d-inline-block rounded border-0 py-1 m-0 mb-0 ps-2" placeholder="940845786">
                                    <p class="text-danger m-0 mb-2 fw-bold" id="cel_buy_error" style="font-size:small;display: none">Este campo es requerido</p>
                                </div>
                                <div class="col-12">
                                    <label for="" class="d-block fs-6 fw-bold mb-2 texto-productos">RUT <p class="d-inline-block text-danger m-0">*</p></label>
                                    <input id="rut" type="text" class="fs-6 w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 ps-2" name="document_buy" placeholder="11.111.111-1">
                                    <p class="text-danger m-0 mb-2 fw-bold" id="document_buy_error" style="font-size:small;display: none">Este campo es requerido</p>
                                </div>
                                <div class="col-12">
                                    <label for="" class="d-block fs-6 fw-bold mb-2 texto-productos">Fecha de nacimiento </label>
                                    <input type="text" id="fechaNacimiento" class="fs-6 w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 ps-2 bg-white" name="bith_buy" placeholder="05-06-1990" onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>
                            </div>
                        </div>
                    <input type="hidden" name="productsList" id="productsList" value="">
                </form>
            </div>
        </div>
        {{-- Resumen de pedido --}}
        <div class="col-12 col-md-6 col-lg-5 px-md-5" >
            <div class="row mt-3">
                <div class="col-lg-2"></div>
                <div class="col-12 col-lg-10">
                    <h1 class="fs-3 fw-bold mb-4">Tu pedido</h1>
                    <div id="carDetail" class="mb-3">

                    </div>
                    <hr>
                    <div class="row d-flex align-items-center">
                        <div class="col-3 col-sm-2 col-lg-3">
                        </div>
                        <div class="col-5 col-sm-6 col-lg-5">
                            <p class="fs-6 fw-bold">Subtotal</p>
                        </div>
                        <div class="col-4">
                            <p class="text-end fs-6 fw-bold cartTotal subTotal"> Subtotal CLP</p>
                        </div>
                        <input type="text" id="cuponSeleccionado" class="d-inline-block rounded-start border-0 py-1 m-0 w-50 ps-2 d-none">

                        <div class="col-3 col-sm-2 col-lg-3">
                        </div>
                        <div class="col-5 col-sm-6 col-lg-5">
                            <p class="fs-6 fw-bold m-0">Total</p>
                        </div>
                        <div class="col-4">
                            <p class="text-end fs-6 fw-bold m-0 cartTotal"> Total CLP</p>
                        </div>
                    </div>
                    <hr class="my-2">
                    {{-- Webpay --}}
                    <div class="row d-flex align-items-center">
                        <div class="webpay col-12 m-0 p-0 paymentWebpay">
                            <div class="row m-0 p-0 align-items-center">
                                <div class="col-3"></div>
                                <div class="col-5">
                                    <p class="fs-6 fw-bold">Transbank Webpay</p>
                                </div>
                                <div class="col-4 py-3">
                                    <img src="{{ asset('img/webpay.png') }}" alt="Webpay" class="w-100">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-1 mt-3">
                            <p class="fs-6 texto-productos m-0">Permite el pago de productos y/o servicios, con tarjetas de crédito y Redcompra a través de Webpay Plus</p>
                        </div>
                        <hr class="m-0">
                        <div class="col-12 mb-1 mt-4">
                            <p class="fs-6 texto-politicas m-0">Tu información va a ser usada para comprar y procesar tu curso, y para otros propósitos descritos en nuestra <a href="#" style="color: #21254d !important;">política de privacidad.</a></p>
                        </div>
                        <div class="col-12 justify-content-center d-flex">
                            {{-- botones de pago --}}
                            <button id="btnFnCmp" type="button" class="btn bg-primario w-100 hvr-pulse rounded rounded-3 shadow-sm initBuy btncompraWebpay d-none text-light">
                                <div id="showFinalizarCompraDiv">
                                    <span class="btnFinalizarCompra text-white">Finalizar compra</span>
                                </div>
                                <div id="showLoadingProcesandoCompraDiv" style="display: none;">
                                    <span class="btnProcesandoCompra">Procesando...</span>
                                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                                </div>
                            </button>
                        </div>
                        <div class="col-12 justify-content-center d-flex mt-1" id="btncompramodal">
                            <a href="#" class="btn btn-info w-100 hvr-pulse rounded rounded-3 shadow-sm finalvalidation d-none">
                               Finalizar compra
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-11 ms-0 ms-lg-5 ps-lg-5 mt-5 text-center">
            <p class="fs-6 texto-productos">¡Hola! Si eres de una empresa o quieres comprar cursos para más de una persona, contáctate con nosotros por favor al correo ventas@sasi.cl ¡Te estaremos esperando!</p>
        </div>
    </div>

    @endsection

    @push('scriptsOpcionales')
    <script src="{{ asset('js/jquery.rut.js') }}"></script>
    <script src="{{ asset('js/finalizarCompra.js') }}"></script>
@endpush
