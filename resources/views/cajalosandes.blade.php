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
<link rel="stylesheet" href="{{ asset('css/suscripcion.css') }}">

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

@include('partials.modal_caja')


<div class="container-fluid m-0 p-0 overflow-hidden">
    {{-- PRIMER BANNER --}}
    @isset($banners[0])
    <section>
        {{-- imagen del banner --}}
        <div class="hero b_Caja_CA" style="background-image: url('{{ asset('storage/'.$banners[0]->imagen_desktop) }}'); height:60vh !important;">
            <style>
                @media only screen and (max-width: 1200px) {
                    .b_Caja_CA {
                        background-image: url('{{ asset('storage/'.$banners[0]->imagen_movil) }}') !important;
                        background-position: center !important;
                    }
                }
            </style>
            <div class="container-fluid h-100">
                <div class="row align-items-start align-items-xl-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                    <div class="col-12 col-xl-6 pt-5 pt-md-0">
                        <img class="ms-4 ms-xl-5 w-50 mb-2 mt-5 mt-xl-0" src="{{ asset('img/logo_caja_los_andes.png') }}" alt="Logo Caja los Andes">

                        <p class="ms-xl-5 text-center text-xl-start animate__animated animate__fadeInLeft banner-text lh-sm mb-0 mb-xl-3">
                            {!! $banners[0]->texto_principal !!}
                        </p>
                        <div class="row ms-xl-5">
                            <div class="col-10 col-md-6 pt-0 pt-xl-3 text-start p-0 mx-auto mx-xl-0 text-center text-xl-start">
                                @if ($banners[0]->boton != 2)
                                    <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary text-uppercase" type="button" data-bs-toggle="modal" data-bs-target="#Modal-caja">Ver Cursos</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endisset
    {{-- CATEGORIAS --}}
    <section>
        <div class="b_categorias fondo-gris mt-5" style="background-image: url('{{ asset('img/categorias/fondo_categorias copia.png') }}');">
            <p class="fs-2 text-center text-primario d-block py-2 m-0 fw-bold">
                Tenemos Cursos en distintas áreas
                <h5 class="text-center text-primario d-block fs-4 fs-movil-2 m-0">Haz click en el área que más te interese</h5>
            </p>
            <div class="container-fluid d-flex flex-wrap justify-content-center align-items-center">
                @isset($categorias)
                    <a href="/cursos/CLA-Descuentos" class="border-anim caja-categoria text-decoration-none text-light rounded rounded-3 my-2 mx-4 text-center">
                        <img class=" mt-3 mt-xl-4 icon-categoria mx-auto" src="{{ url('storage/'.$categorias[1]->icono) }}" alt="CLA-Descuentos">
                        <p class="fs-6 text-center text-dark text-categoria fw-bold m-0 mt-1 mt-xl-3">CLA-Descuentos</p>
                    </a>
                    <a href="/cursos/Sasi-Kids" class="border-anim caja-categoria text-decoration-none text-light rounded rounded-3 my-2 mx-4 text-center">
                        <img class=" mt-3 mt-xl-4 icon-categoria mx-auto" src="{{ url('storage/'.$categorias[2]->icono) }}" alt="Sasi-Kids">
                        <p class="fs-6 text-center text-dark text-categoria fw-bold m-0 mt-1 mt-xl-3">Sasi-Kids</p>
                    </a>
                    <a href="/cursos/CLA" class="border-anim caja-categoria text-decoration-none text-light rounded rounded-3 my-2 mx-4 text-center">
                        <img class=" mt-3 mt-xl-4 icon-categoria mx-auto" src="{{ url('storage/'.$categorias[3]->icono) }}" alt="CLA">
                        <p class="fs-6 text-center text-dark text-categoria fw-bold m-0 mt-1 mt-xl-3">Gratuito</p>
                    </a>
                    <a href="/cursos/Area_Salud" class="border-anim caja-categoria text-decoration-none text-light rounded rounded-3 my-2 mx-4 text-center">
                        <img class=" mt-3 mt-xl-4 icon-categoria mx-auto" src="{{ url('storage/'.$categorias[0]->icono) }}" alt="Area_Salud">
                        <p class="fs-6 text-center text-dark text-categoria fw-bold m-0 mt-1 mt-xl-3">Área Salud</p>
                    </a>
                @endisset
            </div>
        </div>
    </section>
    {{-- CURSOS CAJA LOS ANDES--}}
    <section class="fondo_gris pb-5">
        <div class="row d-flex flex-wrap justify-content-center mx-3">
            <div class="col-12">
                <p class="fs-2 text-center pt-5 {{-- text-uppercase --}} mb-4 text-primario fw-bold">
                    Disfruta de toda la oferta de cursos que tenemos para ti
                </p>
            </div>

            @isset($productos)
            @foreach ($productos as $producto)
            <div class="card-Prod m-4 bg-light position-relative">
                <!--end hover info curso-->
                <div class="gridProd position-relative">
                    <img class="imgProducto w-100" src="{{ $producto->imagen_producto }}" onerror="this.src='{{ $producto->imagen_producto }}'"  alt="{{ $producto->nombre_producto }}">
                </div>
                <div class="infoProducto w-100">
                    <div class="nombreProd">
                        <a class="nombre_curso" href="detalle-curso/{{ $producto->sku}}" title="">
                            <h2>{{ $producto->nombre_producto }}</h2>
                        </a>
                    </div>
                    <div class="nombreProfe">
                        <h4 class="Profe">{{ $producto->nombre_profesor }}</h4>
                    </div>
                </div>
                @if($producto->precio !== "0")
                    <div class="precioDescuento">
                        <h3 class="text-decoration-line-through"> ${{ $producto->precio_anterior }}</h3>
                    </div>
                    <div class="precioProducto">
                        <h3>${{ $producto->precio }}</h3>
                    </div>
                @else
                    <div class="precioProducto">
                        <h3>Curso Gratuito</h3>
                    </div>
                @endif
                <div class="mt-3 px-3">
                    <a href="#" class="w-100 text-decoration-none text-dark m-0 p-0 btnComprar" data-idlms="{{ $producto->id_lms }}" data-id="{{ $producto->id }}" data-img="{{ $producto->imagen_producto }}" data-price="$ {{ $producto->precio }}" data-pname="{{ $producto->nombre_producto }}">
                        <p class="w-100 hvr-pulse bg-los-andes btn py-1 icon-gift shadow fs-8 fw-bold text-white">
                            <span class="text-white">Inscríbete ya</span>
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
            @endisset
        </div>
    </section>
    {{-- CURSOS SASI--}}
    <section class="fondo_gris pb-5 d-none">
        <div class="row d-flex flex-wrap justify-content-center mx-3">
            <div class="col-12">
                <p class="fs-2 video-text text-center pt-5 text-uppercase mb-4">
                    ¡Conoce más cursos con increíbles descuentos!
                </p>
            </div>
            @isset($cursosasi)
            @foreach ($cursosasi as $cursoS)
            <div class="card-Prod m-2 bg-light position-relative">
                <!--end hover info curso-->
                <div class="gridProd position-relative">
                    <img class="imgProducto w-100" src="{{ url($cursoS->imgThumbnail) }}" alt="{{ $cursoS->nombre_producto }}">
                </div>
                <div class="infoProducto w-100">
                    <div class="nombreProd">
                        <a class="nombre_curso" href="detalle-curso/{{ $cursoS->sku}}" title="">
                            <h2>{{ $cursoS->nombre_producto }}</h2>
                        </a>
                    </div>
                    <div class="nombreProfe">
                        <h4 class="Profe">{{ $cursoS->nombre_profesor }}</h4>
                    </div>
                </div>
                <div class="precioDescuento">
                    <h3 class="text-decoration-line-through"> ${{ $cursoS->precio_anterior }}</h3>
                </div>
                <div class="precioProducto">
                    @if($productos->precio !== "0")
                        <h3> $ {{ $cursoS->precio }}</h3>
                    @endif
                </div>
                <div class="mt-3 px-3">
                    <a href="#" class="w-100 btnComprar text-decoration-none m-0 p-0" data-idlms="{{ $cursoS->id_lms }}" data-id="{{ $cursoS->id }}" data-img="{{ url($cursoS->imagen_producto) }}" data-price="$ {{ $cursoS->precio }}" data-pname="{{ $cursoS->nombre_producto }}">
                        <p class="w-100 hvr-pulse bg-primario btn py-1 icon-shopping-cart shadow fs-8 fw-bold text-light">
                            <span>¡Inscribete ya!</span>
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
            @endisset
            <div>
                <div class="col-10 col-md-6 pt-3 text-center p-0 mx-auto mb-5">
                    <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" onclick="location.href='/cursos'">VER MÁS</button>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $('#canonical').attr('href', 'https://sasi.cl/cajalosandes');
    $('.tituloSasi').html('Sasi Caja Los Andes');

    document.addEventListener('DOMContentLoaded', function() {
        const validado = sessionStorage.getItem("ValidaciónCLA");

        if (validado === null || validado === undefined || validado === '') {
            //console.log('La variable de sesión "ValidaciónCLA" está vacía.');
        } else {
            sessionStorage.removeItem("ValidaciónCLA");
        }
    });

    $(document).ready(function() {

        let idCursoLms;
        let idCursoSasi;

        $('.btnInscribir').click(function(){
            idCursoLms = $(this).data('idlms');
            idCursoSasi = $(this).data('id');
        });


    });

</script>
@endsection
