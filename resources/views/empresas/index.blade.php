@extends('layouts.nav')

@section('content')

<link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
<link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
<link rel="stylesheet" href="{{ asset('css/banners.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/ban_categorias.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/cursosHome.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/video.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/newsletter.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/carrousel.css') }}">

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<div class="container-fluid m-0 p-0 overflow-hidden">
    {{-- PRIMER BANNER --}}
    <section>
        {{-- imagen del banner --}}


        <div class="hero bHome1" style="background-image: url('{{ asset('storage/'.$banners[0]->imagen_desktop) }}');">
            <style>
                 @media only screen and (max-width: 990px) {
                    .bHome1 {
                        background-image: url('{{ asset('storage/'.$banners[0]->imagen_movil) }}') !important;
                        background-position-y: 63%;
                    }
                }
            </style>
            <div class="container-fluid h-100">
                <div class="row align-items-end align-items-lg-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                    <div class="col-12 col-lg-6 pt-5 pt-md-0">

                        <p class="ms-lg-5 text-center text-lg-start animate__animated animate__fadeInLeft banner-text lh-sm">
                           {!! $banners[0]->texto_principal !!}
                        </p>
                        <div class="row ms-lg-5">
                            <div class="col-10 col-md-6 pt-3 text-start p-0 mx-auto mx-lg-0 text-center text-lg-start">
                                @if ($banners[0]->boton > 0)
                                    <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" onclick="location.href='#'">REGÍSTRATE GRATIS</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- CATEGORIAS --}}
    <section>
        <div class="b_categorias" style="background-image: url('{{ asset('img/categorias/fondo_categorias.png') }}');">
            <div class="container-fluid d-flex flex-wrap justify-content-center align-items-center pt-5">
                @isset($categorias)
                    @foreach ($categorias as $categoria)
                        <a href="#" class="border-anim caja-categoria text-decoration-none text-light rounded rounded-3 m-2">
                            <img class=" mt-3 mt-lg-4 icon-categoria" src="{{ url('storage/'.$categoria->icono) }}" alt="">
                            <p class="fs-6 text-center text-categoria text-uppercase mt-1 mt-lg-3">{{ __($categoria->name) }}</p>
                        </a>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
    {{-- CURSOS --}}
    <section class="fondo_gris">
        <div class="{{-- grid --}} row d-flex flex-wrap justify-content-center mx-3">
            <div class="col-12 col-lg-7">
                <p class="fs-2 video-text text-center pt-5">
                    ¿QUÉ TE GUSTARÍA APRENDER HOY?
                </p>
            </div>
            <div class="col-lg-5"></div>

            @isset($productos)
                @for ($i=0; $i<12; $i++)
                    {{-- <div class="product-item element-item @isset($producto->categorias) @foreach ($productos[0]->categorias as $cat) {{ str_replace('.', '',$cat) }} @endforeach @endisset mx-3 p-0 col-3" data-category=".all @isset($productos[0]->categorias) @foreach ($productos[0]->categorias as $cat) {{ $cat }} @endforeach @endisset"> --}}
                    <div class="card-Prod m-2 bg-light">
                        <div class="gridProd position-relative">
                            <img class="imgProducto w-100" src="{{ url($productos[0]->imagen_producto) }}">
                            <div class="hover-outer imgProducto w-100 position-absolute top-0">
                                <a href="#" class="linkVideo d-flex align-items-center justify-content-center mx-auto text-decoration-none position-absolute play">
                                    <div class="icon-play fs-4" ></div>
                                </a>
                            </div>
                        </div>
                        <div class="infoProducto w-100">
                            <div class="nombreProd">
                                <a class="nombre_curso" href="" title="">
                                    <h2>{{ $productos[0]->nombre_producto }}</h2>
                                </a>
                            </div>
                            <div class="nombreProfe">
                                <h4 class="Profe">{{ $productos[0]->nombre_profesor }}</h4>
                            </div>
                        </div>
                        <div class="precioDescuento">
                            <h3 class="text-decoration-line-through"> ${{ $productos[0]->precio_anterior }}</h3>
                        </div>
                        <div class="precioProducto">
                            <h3> $ {{ $productos[0]->precio }}</h3>
                        </div>
                        <div class="btn-group- ">
                            <div>
                                <a href="#" class="btnComprar mx-3 mb-3 fs-8 pt-2 shadow">
                                <img class="btnComprartest" src="https://static.vgroup.cl/2022/06/VGROUP/cart-fill.svg">
                                ¡Comprar Ahora!</a>
                            </div>
                        </div>
                    </div>
                @endfor
            @endisset
            <div>
                <div class="col-10 col-md-6 pt-3 text-center p-0 mx-auto mb-5">
                    <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" onclick="location.href='/cursos'">VER MÁS</button>
                </div>
            </div>
        </div>
    </section>
    {{-- BANNER APP--}}
    <section>
        {{-- imagen del banner --}}
        <div class="hero bHome2" style="background-image: url('{{ asset('storage/'.$banners[1]->imagen_desktop) }}');">
            <style>
                @media only screen and (max-width: 990px) {
                    .bHome2 {
                        background-image: url('{{ asset('storage/'.$banners[1]->imagen_movil) }}') !important;
                        background-position: center !important;
                    }
                }
            </style>
            <div class="container-fluid h-100">
                <div class="row align-items-start align-items-lg-center m-0 h-100 my-auto pb-5 pt-md-0 justify-content-center justify-content-lg-end">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-6 pt-5 pt-md-0 me-lg-5">

                        <p class="text-center mt-5 pt-5 text-lg-end animate__animated animate__fadeInLeft banner-text lh-sm">
                        {!! $banners[1]->texto_principal !!}
                        </p>
                        <div class="row justify-content-end">
                            <div class="col-10 col-md-6 pt-3 p-0 mx-auto mx-lg-0 text-center text-lg-end d-lg-flex justify-content-center justify-content-lg-end ">
                                @if ($banners[1]->boton > 0)
                                    <a href="" class="d-block d-lg-inline-flex my-3 my-lg-0 mx-lg-3 ">
                                        <img src="{{ asset('img/Google_play.png') }}" alt="" class="h-25 w-50 w-lg-normal hvr-pulse shadow">
                                    </a>
                                    <a href="" class="d-block d-lg-inline-flex my-3 my-lg-0 mx-lg-3 ">
                                        <img src="{{ asset('img/App_store.png') }}" alt="" class="h-25 w-50 w-lg-normal hvr-pulse shadow">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- PROXIMAMENTE--}}
    <section class="position-relative">
        <div class='container-fluid'>
            <div class="carousel" id="carousel">
                @isset($productos)
                    @for($i=0; $i<9; $i++)
                        <div class="carousel__slide">
                            <div class="carousel__visual">
                                <div class="Prox-Prod w-100 bg-white position-relative p-0 mx-auto">
                                    <img class="w-100 Prox-img p-0 m-0" alt=""src="{{ url($productos[0]->imagen_producto) }}">
                                    <a class="nombre_curso" href="" title="">
                                        <h2>{{ $productos[0]->nombre_producto }}</h2>
                                    </a>
                                    <a href="#" class="lh-1 shadow position-absolute bottom-0 start-50 translate-middle-x btn-proximamente mb-3 d-flex align-items-center justify-content-center px-4">Avísame cuando este disponible</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endisset
            </div>
            <div class='nav__prev'><i class="fas fs-1 fw-normal py-3 px-2 text-white icon-chevron-left"></i></div>
            <div class='nav__next'><i class="fas fs-1 fw-normal py-3 px-2 text-white icon-chevron-right"></i></div>
        </div>
    </section>
    {{-- NEWSLETTER--}}
    <section>
        <div class="container-fluid h-100" style="background-color: #474747">
            <div class="row align-items-center m-0 h-100 my-auto py-5 justify-content-center">
                <div class="col-10 col-md-7 col-lg-4">
                    <p class="ms-sm-5 fs-5 fw-bold text-center text-lg-start lh-sm text-light">
                        Regístrate en nuestro Newsletter y recibirás un increíble regalo
                    </p>
                </div>
                <div class="col-10 col-md-7 col-lg-3 my-2">
                    <input type="text" class="newsletter-text w-100 rounded-pill border border-1" placeholder="Correo">
                </div>
                <div class="col-10 col-md-7 col-lg-3 my-2">
                    <input type="text" class="newsletter-text w-100 rounded-pill border border-1" placeholder="Nombre">
                </div>
                <div class="col-10 col-md-7 col-lg-2 my-2">
                    <button class="hvr-pulse shadow fs-6 rounded-pill btn btn-primary px-5 text-dark w-100" type="button" onclick="location.href='#'">REGISTRARME</button>
                </div>
            </div>
        </div>
    </section>
    {{-- >>>VIDEO<<< --}}
    <section class="fondo_gris">
        <div class="row align-items-end align-items-lg-center m-0 h-100 my-auto pb-5 pt-md-0">
            <div class="col-12 col-lg-7 pt-5 pt-md-0">
                <p class="fs-2 video-text text-center pt-5">
                    ¿POR QUÉ ESTUDIAR CON SASI?
                </p>
                <div class="p-0 ps-lg-5 pt-lg-5 d-flex align-content-center position-relative">
                    <img class="fondo_video mx-auto p-0 ps-lg-5" src="{{ asset('img/Mancha_fondo_video.png') }}" alt="">
                    <img class="w-100 position-absolute notebook" src="{{ asset('img/notebook.png') }}" alt="">
                    <video id="video_sasi"class="position-absolute video_sasi" src="https://static.vgroup.cl/2022/02/WEB-VGROUP/VIDEO/Sasi_Pagina_web_v2.mp4" controls="" preload="auto"></video>
                    <div id="play-video" class="">
                        <img class="position-absolute video_poster" src="{{ asset('img/poster_video.png') }}" alt="">
                        <button class="position-absolute border-0 bg-transparent play_boton play">
                            <svg class="w-100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="250.913" height="250.913" viewBox="0 0 250.913 250.913">
                                <defs>
                                  <filter id="Trazado_1" x="0" y="0" width="250.913" height="250.913" filterUnits="userSpaceOnUse">
                                    <feOffset dy="3" input="SourceAlpha"></feOffset>
                                    <feGaussianBlur stdDeviation="3" result="blur"></feGaussianBlur>
                                    <feFlood flood-opacity="0.161"></feFlood>
                                    <feComposite operator="in" in2="blur"></feComposite>
                                    <feComposite in="SourceGraphic"></feComposite>
                                  </filter>
                                  <filter id="Trazado_2" x="87.343" y="72.779" width="83.515" height="105.355" filterUnits="userSpaceOnUse">
                                    <feOffset dy="3" input="SourceAlpha"></feOffset>
                                    <feGaussianBlur stdDeviation="3" result="blur-2"></feGaussianBlur>
                                    <feFlood flood-opacity="0.161"></feFlood>
                                    <feComposite operator="in" in2="blur-2"></feComposite>
                                    <feComposite in="SourceGraphic"></feComposite>
                                  </filter>
                                </defs>
                                <g id="Grupo_3" data-name="Grupo 3" transform="translate(-1677.471 -634.629)">
                                  <g id="play-circle" transform="translate(1686.471 640.629)">
                                    <g transform="matrix(1, 0, 0, 1, -9, -6)" filter="url(#Trazado_1)">
                                      <path id="Trazado_1-2" data-name="Trazado 1" d="M116.457,218.356a101.9,101.9,0,1,1,101.9-101.9,101.9,101.9,0,0,1-101.9,101.9Zm0,14.557A116.457,116.457,0,1,0,0,116.457,116.457,116.457,0,0,0,116.457,232.913Z" transform="translate(9 6)" fill="#fff"></path>
                                    </g>
                                    <g transform="matrix(1, 0, 0, 1, -9, -6)" filter="url(#Trazado_2)">
                                      <path id="Trazado_2-2" data-name="Trazado 2" d="M9.945,5.807a7.279,7.279,0,0,1,7.57.553l50.95,36.393a7.279,7.279,0,0,1,0,11.849L17.515,91A7.279,7.279,0,0,1,6,85.07V12.285A7.279,7.279,0,0,1,9.945,5.807Z" transform="translate(90.34 73.78)" fill="#fff"></path>
                                    </g>
                                  </g>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-5 ">
                <ul class="p-0 ps-lg-5 text-center text-lg-start">
                    <li class="dotless py-2">
                        <p class="fs-6 fw-bolder video-texto">
                            + de 150.000 alumnos felices
                        </p>
                    </li>
                    <li class="dotless py-2">
                        <p class="fs-6 fw-bolder video-texto">
                            Instructores referentes te guiarán
                        </p>
                    </li>
                    <li class="dotless py-2">
                        <p class="fs-6 fw-bolder video-texto">
                            Certificado de participación
                        </p>
                    </li>
                    <li class="dotless py-2">
                        <p class="fs-6 fw-bolder video-texto">
                            Contenido full HD
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

</div>
@endsection
@push('scriptsOpcionales')
    <script>
        $('.play_boton').click(function(){
            $('#play-video').addClass("d-none")
            $('#video_sasi').trigger('play')
        })
        var video = $("#video_sasi");
        /* video.get(0).play(); */
        video.on("ended", function() {
            $('#play-video').removeClass("d-none")
        });
    </script>
    <script src="{{ asset('js/carrusel.js') }}"></script>
@endpush
