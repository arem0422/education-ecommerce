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
<link rel="stylesheet" href="{{ asset('css/empresas/empresas.css') }}">

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<div class="container-fluid m-0 p-0 overflow-hidden">
    <section>
            <div class="">
                <div class="container-fluid h-100">
                    <div class="row align-items-end align-items-lg-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                        <div class="col-12 col-lg-7 pt-5 pt-md-0 position-relative">
                            <img class="fondo_video mx-auto p-0 ps-lg-5 ms-lg-5 w-100 position-relative mt-5" src="https://static.vgroup.cl/lms5/archivo/Fondo_sasi_compra_142_23-07-27-11-43-04-9qrP9.png" alt="Formas para fondo" style="left: 8%;">
                            <img class="sasi-compra position-absolute" src="https://static.vgroup.cl/lms5/archivo/Sasi_pay_fail_142_23-07-27-11-44-12-hJ6m1.png" alt="Sasi Bot">
                        </div>
                        <div class="col-12 col-md-1 col-lg-7 m-0 p-0 d-lg-none"></div>
                        <div class="col-12 col-md-10 col-lg-4 pt-5 pt-md-0">

                            <p class="ms-lg-5 text-center text-lg-start animate__animated animate__fadeInLeft lh-sm pt-0 mt-0 text-gris fs-3 text-shadow">
                                <span class="fw-bold fs-2">Ups...</span>
                                <br>
                                <br>
                                Algo salió mal y no pudimos procesar tu pago.
                            </p>
                            <div class="row ms-lg-5">
                                <div class="col-12 col-lg-11 pt-3 p-0 mx-auto mx-lg-0 text-center">
                                    <button class="hvr-pulse shadow mt-2 fs-5 fs-sm-6 fw-normal px-6 py-3 rounded-pill lh-1 btn btn-primary text-uppercase" type="button" onclick="location.href='#'">Ir a Mis Cursos</button>
                                </div>

                            </div>
                            <p class="ms-lg-5 text-center mt-3 fs-5">Si tu problema persiste contáctanos a <a class="text-secondary"href="mailto: ayuda@sasi.cl">ayuda@sasi.cl</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
@push('scriptsOpcionales')
<script>
    $('#canonical').attr('href', 'https://cajalosandes.sasi.cl/CompraRechazada');
    $('.tituloSasi').html('Compra rechazada');
</script>

@endpush
