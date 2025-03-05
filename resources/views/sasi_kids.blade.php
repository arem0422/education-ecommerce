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
<link rel="stylesheet" href="{{ asset('css/navBar.css') }}">
<link rel="stylesheet" href="{{ asset('css/sasi_kids.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
<link href="{{ asset('bootstrap-5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">

<style>
    body {
        overflow-x: hidden;
    }
</style>

<section class="sasi_kids">

    <body>
        {{-- BANNER 1--}}
        <section>
            {{-- imagen del banner --}}
            <div class="banner_kids bg-fixed bKids" style="background-image: url('{{ asset('img/Banner_sasi_kids.gif') }}'); background-position: center !important; margin-top: -35px;">
                <style>
                    @media only screen and (max-width: 1200px) {

                        .bKids {
                            background-image: url('{{ asset('img/Banner_sasi_kids_movil.gif') }}') !important;
                            background-position: center !important;
                        }
                    }
                </style>
            </div>
        </section>
        {{-- BANNER 2--}}
        <section>
            {{-- imagen del banner --}}
            <div class="banner_kids bKids2" style="background-image: url('{{ asset('img/Banner2_sasi_Kids.png') }}'); background-position: center !important;">
                <style>

                    @media only screen and (max-width: 560px) {

                    .bKids2 {
                        background-image: url('{{ asset('img/Banner2_sasi_Kids_movil.jpg') }}') !important;
                        background-position: center !important;
                    }
                    }
                    @media only screen and (min-width: 560px) and (max-width: 1200px){

                        .bKids2 {
                            background-image: url('{{ asset('img/Banner2_sasi_Kids_tablet.jpg') }}') !important;
                            background-position: center !important;
                        }
                    }
                </style>
                <div class="container-fluid h-100">
                    <div class="align-items-start m-0 h-100 pt-5">
                        <div class="col-12 col-xl-6 pt-0 mt-2 mt-md-5">

                            <p class="ms-xl-5 text-center text-xl-start animate__animated animate__fadeInLeft banner-text lh-sm text-primario">
                            ¡Bienvenidos a sasi kids
                            </p>
                            <p class="ms-xl-5 text-center text-xl-start animate__animated animate__fadeInLeft fs-3 lh-sm text-white kids-banner-2" style="text-shadow: 0px 3px 6px rgb(43 43 43 / 30%);">
                                Un espacio donde encontrarás
                                diferentes cursos online para que
                                niñas y niños se entretengan,
                                aprendan nuevos conocimientos e
                                incrementen su actividad
                                física, con un contenido
                                divertido diseñado
                                específicamente para ellos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Tarjetas de cursos --}}
        <section class="row m-0 p-0 my-3">
            <div class="col-12 col-md-4 p-0 px-1 py-1 py-md-0">
                <div class="cord-hover-flip card-sasi-kids shadow">
                    <img class="card-img" alt="Futbol" src="{{ asset('img/CARD_FUTBOL.png') }}" />
                    <figcaption class="card-body futbol">
                        <style>
                            .futbol{
                                background: radial-gradient(circle, rgba(84,213,0,1) 0%, rgba(0,158,0,1) 100%) !important;
                            }
                        </style>
                        <h5 class="card-title text-dark fs-1 text-center mt-2 mt-lg-5  mb-2 text-uppercase text-shadow text-white fw-bold">Fútbol</h5>
                        <p class="card-text fs-5  text-center text-shadow text-white text-normal">
                        Bienvenido al entrenamiento que hará que puedas desarrollar todas tus habilidades con el balón y puedas aprender junto a un entrenador de primer nivel.

                        </p>
                        <div class="w-100 text-center mt-auto position-absolute start-0" style="bottom: 4%">
                            <a href="#" class="d-block mb-3 fs-5 text-decoration-none text-white text-shadow" id="ver-mas-futbol" data-bs-toggle="modal" data-bs-target="#Modal-video-sasi-kids">Ver más <i class="em em-smiley"></i></a>
                            <button type="button" class="btn bg-primario fs-5 fw-bold m-0 p-0 px-5 py-1 shadow hvr-pulse "><a class="text-decoration-none text-gris" href="#" data-bs-toggle="modal" data-bs-target="#Modalformkids">¡Inscribirme!</a></button>
                        </div>
                    </figcaption>
                </div>
            </div>
            <div class="col-12 col-md-4 p-0 px-1 py-1 py-md-0">
                <div class="cord-hover-flip card-sasi-kids shadow">
                    <img class="card-img" alt="Yoga" src="{{ asset('img/CARD_YOGA.png') }}" />
                    <figcaption class="card-body yoga">
                        <style>
                            .yoga{
                                background: radial-gradient(circle, rgba(228,203,115,1) 0%, rgba(236,183,0,1) 100%) !important;
                            }
                        </style>
                        <h5 class="card-title text-dark fs-1 text-center mt-2 mt-lg-5  mb-2 text-uppercase text-shadow text-white fw-bold">Yoga</h5>
                        <p class="card-text fs-5  text-center text-shadow text-white text-normal">
                            Aprende los movimientos y posiciones de yoga más entretenidas para motivar a los niños a mover su cuerpo y calmar sus emociones.

                        </p>
                        <div class="w-100 text-center mt-auto position-absolute start-0" style="bottom: 4%">
                            <a href="#" class="d-block mb-3 fs-5 text-decoration-none text-white text-shadow" id="ver-mas-yoga" data-bs-toggle="modal" data-bs-target="#Modal-video-sasi-kids">Ver más <i class="em em-smiley"></i></a>
                            <button type="button" class="btn bg-primario fs-5 fw-bold m-0 p-0 px-5 py-1 shadow hvr-pulse "><a class="text-decoration-none text-gris" href="#" data-bs-toggle="modal" data-bs-target="#Modalformkids">¡Inscribirme!</a></button>
                        </div>
                    </figcaption>
                </div>
            </div>
            <div class="col-12 col-md-4 p-0 px-1 py-1 py-md-0">
                <div class="cord-hover-flip card-sasi-kids shadow">
                    <img class="card-img" alt="Baile" src="{{ asset('img/CARD_BAILE.png') }}" />
                    <figcaption class="card-body baile">
                        <style>
                            .baile{
                                background: radial-gradient(circle, rgba(251,39,147,1) 0%, rgba(183,6,103,1) 100%) !important;
                            }
                        </style>
                        <h5 class="card-title text-dark fs-1 text-center mt-2 mt-lg-5  mb-2 text-uppercase text-shadow text-white fw-bold">Baile Entretenido</h5>
                        <p class="card-text fs-5   text-center text-shadow text-white text-normal">
                            Bailar las canciones del momento nunca fue tan divertido. ¡Motívense a bailar, disfrutar y moverse con este curso de baile entretenido!

                        </p>
                        <div class="w-100 text-center mt-auto position-absolute start-0" style="bottom: 4%">
                            <a href="#" class="d-block mb-3 fs-5 text-decoration-none text-white text-shadow" id="ver-mas-baile" data-bs-toggle="modal" data-bs-target="#Modal-video-sasi-kids">Ver más <i class="em em-smiley"></i></a>
                            <button type="button" class="btn bg-primario fs-5 fw-bold m-0 p-0 px-5 py-1 shadow hvr-pulse "><a class="text-decoration-none text-gris" href="#" data-bs-toggle="modal" data-bs-target="#Modalformkids">¡Inscribirme!</a></button>
                        </div>
                    </figcaption>
                </div>
            </div>

        </section>

    </body>
</section>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
    .bg-gris {
        background-color: transparent !important;
        background-image: linear-gradient(180deg, #FF296B 40%, #dc3545 100%) !important;
    }
    .site-navbar {
    border-bottom: none !important;
    background-color: transparent !important;
    }
    .dropdown-menu {
    background-color: #FF296B !important;
    }
</style>
@include('partials.modal_form-kids')
@include('partials.modal_video_kids')
@endsection
@push('scriptsOpcionales')
<script>
    $('#canonical').attr('href', 'https://sasi.cl/sasi_kids');
    $('.tituloSasi').html('Sasi Kids');
    $( ".selector-sasi-kids" ).addClass( "sasi_kids-navbar" ).removeClass("py-1");
    $( "#logo-sasi" ).attr("src","{{ asset('img/logo-SASI-kids-chico.png') }}");
    $( "#logo-sasi" ).addClass( "logo-sasi_kids position-absolute" ).removeClass("w-100");
    $( ".carrito" ).addClass( "d-none" );
    $( "#link-landing" ).empty().append("Sasi").attr("href","/");
    $( ".site-mobile-menu" ).css("background", "#FF296B");

    /* info modal video */
    $("#ver-mas-futbol").click(function(e){
            e.preventDefault();
            $('#modal-kids').css("background", "radial-gradient(circle, rgba(84,213,0,1) 0%, rgba(0,158,0,1) 100%)");
            $('#video-sasi-kids').attr("src","https://player.vimeo.com/video/664450335");
            $('.nombreCurso').empty().append("fútbol");
            $('.descripcionProducto').empty().append("Bienvenido al entrenamiento que hará que puedas desarrollar todas tus habilidades con el balón y puedas aprender junto a un entrenador de primer nivel.");
    });
    $("#ver-mas-yoga").click(function(e){
            e.preventDefault();
            $('#modal-kids').css("background", "radial-gradient(circle, rgba(228,203,115,1) 0%, rgba(236,183,0,1) 100%)");
            $('#video-sasi-kids').attr("src","https://player.vimeo.com/video/664452623");
            $('.nombreCurso').empty().append("yoga");
            $('.descripcionProducto').empty().append("Aprende los movimientos y posiciones de yoga más entretenidas para motivar a los niños a mover su cuerpo y calmar sus emociones.");
    });
    $("#ver-mas-baile").click(function(e){
            e.preventDefault();
            $('#modal-kids').css("background", "radial-gradient(circle, rgba(251,39,147,1) 0%, rgba(183,6,103,1) 100%)");
            $('#video-sasi-kids').attr("src","https://player.vimeo.com/video/664450154");
            $('.nombreCurso').empty().append("baile entretenido");
            $('.descripcionProducto').empty().append("Bailar las canciones del momento nunca fue tan divertido. ¡motívense a bailar, disfrutar y moverse con este curso de baile entretenido!");
    });



</script>

@endpush
