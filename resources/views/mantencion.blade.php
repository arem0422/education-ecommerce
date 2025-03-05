<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>

    <link rel="icon" href="https://static.vgroup.cl/2022/06/SASI%20NEW/Logo%20SASI.png" type="image/x-icon">

    <!--  Favicon  -->
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <!--  Carousel  -->
    <link rel="icon" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!--  animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!--  bootstrap -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

    <link href="{{ asset('bootstrap-5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/main.css') }}" rel="stylesheet">


    <!--  fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <!--  css barra de navegación -->
    <link rel="stylesheet" href="{{ asset('css/navBar.css') }}">
    <!--  croppie -->
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P656ZKX');</script>
    <!-- End Google Tag Manager -->

    <!--  Css especificos -->
    @stack('cssOpcionales')

    <title>Sasi Mantención</title>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P656ZKX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="container-fluid m-0 p-0 overflow-hidden">
        <section>
                <div class="">
                    <div class="container-fluid h-100">
                        <div class="row align-items-end align-items-lg-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                            <div class="col-12 col-lg-7 pt-5 pt-md-0 position-relative">
                                <img class="fondo_video mx-auto p-0 ps-lg-5 ms-lg-5 w-100 position-relative mt-5" src="{{ asset('img/Fondo_sasi_compra.png') }}" alt="Formas para fondo" style="left: 8%;">
                                <img class="sasi-compra position-absolute" src="{{ asset('img/Sasi_pay_succes.png') }}" alt="Sasi Bot bien hecho">
                            </div>
                            <div class="col-12 col-md-1 col-lg-7 m-0 p-0 d-lg-none"></div>
                            <div class="col-12 col-md-10 col-lg-4 pt-5 pt-md-0">

                                <p class="ms-lg-5 text-center text-lg-start animate__animated animate__fadeInLeft lh-sm pt-0 mt-0 text-gris fs-3 text-shadow">
                                    <span class="fw-bold fs-2">Estamos trabajando para ti</span>
                                    <br>
                                    <br>
                                    Nuestro SASI bot está trabajando en mejoras del sitio, volvemos pronto...
                                </p>
                                <div class="row ms-lg-5">
                                    <div class="col-12 col-lg-11 pt-3 p-0 mx-auto mx-lg-0 text-center">
                                        <button class="hvr-pulse shadow mt-2 fs-5 fs-sm-6 fw-normal px-6 py-3 rounded-pill lh-1 btn btn-primary text-uppercase d-none" type="button" onclick="location.href='#'">Ir a Mis Cursos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>








    <script src="{{ asset('bootstrap-5.1.3/dist/js/bootstrap.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-smoove/0.2.10/jquery.smoove.min.js"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    {{-- <script src="https://vjs.zencdn.net/5.4.6/video.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('js/croppie.js') }}"></script> --}}
</body>

</html>
