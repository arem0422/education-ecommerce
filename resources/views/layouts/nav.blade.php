<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="ahrefs-site-verification" content="2c4fc411fea8e2beaf3a6e80fc8731946c2ca718b96d3ac0fb603776ed731eaf">
    <meta name="ahrefs-site-verification" content="0e9447e4bb4e62a5fbb6722b7e689efa6d48e73855722c366102b1d4dacddda2">


    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>

    {{-- Url Canonical  --}}
    <link id="canonical" rel="canonical" href="" />

    <link rel="icon" href="https://static.vgroup.cl/2023/05/SASI/SASI-mini.png" type="image/x-icon">

    <!--  Favicon  -->
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <!--  Carousel  -->
    <link rel="icon" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!--  animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!--Bootstrap Sass--->
    <link href="{{ asset('sass/main.css') }}" rel="stylesheet">

    <!--  fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">


    <!--  croppie -->
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">

    <link rel="stylesheet" href="{{ asset('css/banners.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/ban_categorias.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/cursosHome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/video.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/newsletter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/carrousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/suscripcion.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cursos/detalleCurso.css') }}">

    <!--  css barra de navegación -->
    <link rel="stylesheet" href="{{ asset('css/navBar.css') }}">



    <!--AUTOCOMPLETE JS--->
    <link rel="stylesheet" href="{{ asset('css/autoComplete.css') }}">

    @if(!env("TEST_COMPRA"))
    <!--  Function Tag Manager -->
    <script src="{{ asset('js/tag-manager.js') }}"></script>
    <!-- Google Ta}g Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P656ZKX');</script>
    <!-- End Google Tag Manager -->
    @else
        <style>
            .site-navbar {
                background: rgb(2,0,36);
                background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(252,220,4,1) 35%, rgba(0,212,255,1) 100%);
            }
        </style>
        <script>
            function add_to_cart(item){
                console.log("QA event add_to_cart");
            }
            function remove_to_cart(item){
                console.log("QA event remove_to_cart");
            }
            function begin_checkout(item){
                console.log("QA event begin_checkout");
            }
            function purchase(item){
                console.log("QA event purchase");
            }
            setTimeout(() => {
                swal({
                            title: "Atencion!",
                            text: "Ambiente QA-DEV.",
                            type: "warning",
                            icon: 'warning',
                            timer: 1000
                });
            }, 2000)
        </script>
    @endif

    @stack('cssOpcionales')

    <style>
        .autoComplete_wrapper>input{
            background-image: none !important;
            padding: 0 1rem 0 1rem !important;

        }

        .img-search{
            width: 35px;
            height: 30px;
            border-radius: 5%;
        }
        .input-group-search > .icon-search2{
            top: 25%;
            right: 5%;
            color: rgba(59, 53, 53, .4)
        }

    </style>

    <title class="tituloSasi"></title>
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P656ZKX";
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="site-mobile-menu site-navbar-target ">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap" style="z-index: 102">

        <div class="site-navbar site-navbar-target js-sticky-header top-0">
            <div class="container-fluid py-1 selector-sasi-kids">
                <div class="row align-items-center ps-3">
                    {{-- logo sasi --}}
                    <div class="col-4 col-md-2 col-xl-1 p-0 my-auto pe-2 position-relative">
                        <a href="/"><img class="w-100" id="logo-sasi" src="https://static.vgroup.cl/2023/05/SASI/SASI.png" alt=""></a>
                    </div>

                    <div class="col-8 col-md-9 col-xl-10 p-0 m-0">
                        <nav class="site-navigation" role="navigation">

                            <div class="p-0 m-0 text-end text-lg-start float-end float-lg-none d-flex align-items-center justify-content-between">
                                {{-- NAVEGACION MOVIL --}}
                                {{-- carrito de compra movil--}}
                                <button class="btn carrito d-inline-block d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                    <div class=" p-0">
                                        <a {{-- href="/carrito" --}} class="nav-link fs-4 carrito cart text-uppercase fw-bold{{ Request::is('') ? 'active' : '' }}"><span class="icon-shopping-cart">
                                            <span id="cartQtytMvl" class="caritems position-relative top-50 start-0 badge rounded-pill bg-dark bg-gradient">
                                            <span class="visually-hidden">unread messages</span></span>
                                        </a>
                                    </div>
                                </button>
                                {{-- menu de hamburguesa--}}
                                <div class=" d-inline-block d-xl-none ml-md-0 mr-auto py-3">
                                    <a href="#" class="site-menu-toggle js-menu-toggle text-white">
                                        <span class="icon-menu h3 pe-2 d-flex">
                                        </span>
                                    </a>
                                </div>

                                {{-- Navegacion landing --}}
                                <ul class="site-menu main-menu js-clone-nav d-none d-xl-inline-block end-0 align-items-center order-1 ps-5">
                                    <li><a href="{{ route('cursos') }}" class="nav-link px-0 px-xl-1 py-2 fs-nav fw-normal {{ Request::is('/cursos') ? 'active' : '' }}">Cursos</a></li>
                                    {{-- <li><a href="/empresas" class="nav-link px-0 px-xl-1 py-2 fs-nav text-uppercase fw-bold{{ Request::is('') ? 'active' : '' }}">Sasi Empresas</a></li>
                                    <li><a href="/suscripcion" class="nav-link px-0 px-xl-1 py-2 fs-nav text-uppercase fw-bold{{ Request::is('') ? 'active' : '' }}">Suscripción</a></li>
                                    <li><a id="link-landing" href="/sasi_kids" class="nav-link px-0 px-xl-1 py-2 fs-nav text-uppercase fw-bold{{ Request::is('') ? 'active' : '' }}">Sasi Kids</a></li> --}}
                                </ul>

                                <ul class="site-menu main-menu js-clone-nav d-none d-xl-flex end-0 float-end align-items-center order-3">

                                     {{-- SEARCH NAVBAR
                                    <div class="search-navbar d-lg-block d-none">
                                        <div class="input-group-search position-relative" >
                                                <input id="autoComplete" type="text" tabindex="1" style="outline: none" class="newsletter-text rounded-pill border border-1">
                                                <span class="icon-search2 fs-4 position-absolute"></span>
                                        </div>
                                    </div>
                                    END SEARCH NAVBAR --}}


                                    {{-- carrito de compra --}}
                                    <button  id="btnCar" class="btn carrito d-none d-xl-inline-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                        <div class=" p-0">
                                            <span class="nav-link fs-4 carrito cart text-uppercase fw-bold{{ Request::is('') ? 'active' : '' }}">
                                                <span class="icon-shopping-cart text-primario carrito">
                                                    <span id="cartQtyt" class="caritems position-relative top-50 start-0 badge rounded-pill bg-dark bg-gradient">
                                                        <span class="visually-hidden">unread messages</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                    </button>
                                </ul>


                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="espacio-nav" style="height: 69px;"></div>

    {{-- Modal actualizar imagen de perfil --}}
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar foto de perfil</h4>
                    <button type="button" class="btn-close bi bi-x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="m-0 p-0" id="image_demo"></div>
                        </div>
                        <div class="col-12 mb-4 text-center">
                            <button class="btn {{-- btn-success --}} crop_image bg-primario text-gris border-0 px-5 shadow text-light">Guardar imagen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   {{--  Modal carrito --}}
    <div class="offcanvas offcanvas-end fondo_gris" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" aria-hidden="true">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fs-5 fw-bold" id="offcanvasScrollingLabel">Carrito de compra</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr class="m-0 p-0 mb-3">
        <div class="offcanvas-body">
            <div class="row">
                {{-- productos --}}
                <div class="col-12 m-0 p-0 my-2">
                    <div class="row m-0 p-0 productList">

                    </div>

                </div>
                <hr class="my-2">
                {{-- subtotal --}}
                <div class="col-12 m-0 p-0 my-2">
                    <div class="row m-0 p-0">
                        <div class="col-3">
                        </div>
                        <div class="col-6">
                            <p class="fs-6 fw-bold">Subtotal</p>
                        </div>
                        <div class="col-3">
                            <p class="Amountcart text-end fs-6 fw-bold cartTotal"></p>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                {{-- Botones --}}
                <div class="col-12 mt-3 text-center">
                    <button type="button" class="btn bg-primario w-100 rounded rounded-3 shadow-sm text-light" onclick="location.href='/carrito'">
                        <p class="fs-6 p-0 m-0"><span class="icon-shopping-cart"></span> Ir a carrito</p>
                    </button>
                </div>
                <div class="col-12 mt-3 text-center">
                    <button type="button" class="btn bg-primario w-100 rounded rounded-3 shadow-sm text-light" onclick="location.href='/FinalizarCompra'">Finalizar compra</button>
                </div>
            </div>
        </div>
    </div>
    @yield('content')

    @include('partials.modal_login')
    @include('partials.modal_empresas')


    <script src="{{ url('/bootstrap-5.1.3/dist/js/bootstrap.min.js') }}"></script>
    {{-- validador de RUT --}}
    <script src="{{ asset('js/jquery.rut.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-smoove/0.2.10/jquery.smoove.min.js"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>

     <!--AUTOCOMPLETE JS-->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>


    <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script src="{{ asset('js/buyLogic.js') }}"></script>
    @stack('scriptsOpcionales')

</body>

</html>
