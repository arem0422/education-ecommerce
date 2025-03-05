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
    <script>
       // Carga evento PURCHASE GoogleTagManager
       let compra = {!! json_encode($compra) !!};
       purchase(compra);
    </script>
    <section>
            <div class="">
                <div class="container-fluid h-100">
                    <div class="row align-items-end align-items-lg-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                        <div class="col-12 col-lg-7 pt-5 pt-md-0 position-relative">
                            <img class="fondo_video mx-auto p-0 ps-lg-5 ms-lg-5 w-100 position-relative mt-5" src="https://static.vgroup.cl/lms5/archivo/Fondo_sasi_compra_142_23-07-27-11-43-04-9qrP9.png" alt="Formas para fondo" style="left: 8%;">
                            <img class="sasi-compra position-absolute" src="https://static.vgroup.cl/lms5/archivo/Sasi_pay_succes_142_23-07-27-11-44-55-jmwL4.png" alt="Sasi Bot">
                        </div>
                        <div class="col-12 col-md-1 col-lg-7 m-0 p-0 d-lg-none"></div>
                        <div class="col-12 col-md-10 col-lg-4 pt-5 pt-md-0">

                            <p class="ms-lg-5 text-center text-lg-start animate__animated animate__fadeInLeft lh-sm pt-0 mt-0 text-gris fs-3 text-shadow">
                                <span class="fw-bold fs-2">Genial, tu compra fue procesada exitosamente!</span>
                                <br>
                                <br>
                                Te hemos enviado un correo con las instrucciones para acceder
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
@push('scriptsOpcionales')
<script>
    $('#canonical').attr('href', 'https://cajalosandes.sasi.cl/CompraExitosa');
    $('.tituloSasi').html('Compra exitosa');
    sessionStorage.clear();
</script>
@endpush
