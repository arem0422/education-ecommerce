@extends('layouts.nav')

@section('content')


<link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
<link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<div class="container-fluid m-0 p-0 overflow-hidden">
    {{-- @include('partials.publicidad_suscripcion') --}}
    {{-- PRIMER BANNER --}}
    <section>
        {{-- imagen del banner --}}
        <div class="hero bHome1" style="background-image: url('{{ asset('storage/'.$banners[0]->imagen_desktop) }}');">
            <style>
                @media only screen and (max-width: 1200px) {
                    .bHome1 {
                        background-image: url('{{ asset('storage/'.$banners[0]->imagen_movil) }}') !important;
                        background-position-y: 63%;
                    }
                }
            </style>
            <div class="container-fluid h-100">
                <div class="row align-items-end align-items-xl-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                    <div class="col-12 col-xl-6 pt-5 pt-md-0">

                        <p class="ms-xl-5 text-center text-xl-start animate__animated animate__fadeInLeft banner-text lh-sm">
                           {!! $banners[0]->texto_principal !!}
                        </p>
                        <div class="row ms-xl-5">
                            <div class="col-12 pt-3 text-start p-0 mx-auto mx-xl-0 text-center text-xl-start">

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
            <p class="fs-2 text-center text-white d-block pt-2 m-0 fw-bold text-shadow">
                Tenemos Cursos en distintas áreas
                <h5 class="text-center text-white d-block fs-4 fs-movil-2 m-0">Haz click en el área que más te interese</h5>
            </p>
            <div class="container-fluid d-flex flex-wrap justify-content-center align-items-center">
                @isset($categorias)
                    @foreach ($categorias as $categoria)
                        <a href="/cursos/{{ __($categoria->url) }}" class="border-anim caja-categoria text-decoration-none text-light rounded rounded-3 m-2">
                            <img class=" mt-3 mt-xl-4 icon-categoria" src="{{ url('storage/'.$categoria->icono) }}" alt="{{ __($categoria->name) }}">
                            <p class="fs-6 text-center text-categoria text-uppercase m-0 mt-1 mt-xl-3">{{ __($categoria->name) }}</p>
                        </a>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
    {{-- CURSOS --}}
    <section class="fondo_gris">
        <div class="row d-flex flex-wrap justify-content-center mx-3">
            <div class="col-12 col-lg-7">
                <p class="fs-2 video-text text-center pt-5">
                    ¿QUÉ TE GUSTARÍA APRENDER HOY?
                </p>
            </div>
            <div class="col-lg-5"></div>

            @isset($productos)
                @foreach ($productos as $producto)
                    <div class="card-Prod m-2 bg-light position-relative">
                        <!--end hover info curso-->
                        <div class="gridProd position-relative">
                            <img class="imgProducto w-100" src="{{ url('storage/'.$producto->imagen_producto) }}" onerror="this.src='{{ url($producto->imagen_producto) }}'" alt="{{ $producto->nombre_producto }}">
                            {{-- <img class="imgProducto w-100" src="{{ url('storage/'.$producto->imagen_producto) }}"> --}}
                            @if (in_array('.Populares', $producto->categorias))
                                <div class="position-absolute start-0 top-0">
                                    <p class="bg-primario text-dark px-3 py-1 fs-6 rounded-3 shadow text-light">Curso destacado</p>
                                </div>
                            @endif

                            <div class="hover-outer imgProducto w-100 position-absolute top-0">
                                <a href="#" class="linkVideo d-flex align-items-center justify-content-center mx-auto text-decoration-none position-absolute play" data-bs-toggle="modal" data-bs-target="#exampleModal" data-video="{{ $producto->url_video }}" data-titulo="{{ $producto->nombre_producto }}" data-profesor="{{ $producto->nombre_profesor }}" data-descripcion="{{ $producto->descripcion }}" data-descuento="{{ $producto->precio_anterior }}" data-precio="{{ $producto->precio }}" data-urldetalle={{$producto->sku}}>
                                    <div class="icon-play fs-4" ></div>
                                </a>
                            </div>
                        </div>
                        <div class="infoProducto w-100">
                            <div class="nombreProd">
                                <a class="nombre_curso fs-movil-2" href="detalle-curso/{{ $producto->sku}}" title="">
                                    <h2 class="">{{ $producto->nombre_producto }}</h2>
                                </a>
                            </div>
                            <div class="nombreProfe">
                                <h4 class="Profe">{{ $producto->nombre_profesor }}</h4>
                            </div>
                        </div>
                        <div class="precioDescuento">
                            <h3 class="text-decoration-line-through"> ${{ $producto->precio_anterior }}</h3>
                        </div>
                        <div class="precioProducto">
                            <h3> $ {{ $producto->precio }}</h3>
                        </div>
                        <div class="mt-3 px-3">
                            <a href="#" class="w-100 btnComprar text-decoration-none text-dark m-0 p-0" data-idlms="{{ $producto->id_lms }}" data-id="{{ $producto->id }}" data-img="{{ url('storage/'.$producto->imagen_producto) }}" data-price="$ {{ $producto->precio }}" data-pname="{{ $producto->nombre_producto }}" data-panterior="{{ $producto->precio_anterior }}" data-profname="{{ $producto->nombre_profesor }}">
                                <p class="w-100 hvr-pulse bg-primario btn py-1 icon-shopping-cart shadow fs-8 fw-bold text-light">
                                    <span>¡Comprar Ahora!</span>
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
    {{-- BANNER APP--}}
    <section>
        {{-- imagen del banner --}}
        <div class="hero bHome2" style="background-image: url('{{ asset('storage/'.$banners[1]->imagen_desktop) }}'); background-position: center !important;">
            <style>
                @media only screen and (max-width: 1200px) {
                    .bHome2 {
                        background-image: url('{{ asset('storage/'.$banners[1]->imagen_movil) }}') !important;
                        background-position: center !important;
                    }
                }
            </style>
            <div class="container-fluid h-100">
                <div class="row align-items-start align-items-xl-center m-0 h-100 my-auto pb-5 pt-md-0 justify-content-center justify-content-xl-end">
                    <div class="col-12 col-sm-12 col-md-10 col-xl-6 pt-5 pt-md-0 me-xl-5">

                        <p class="text-center mt-5 pt-5 text-xl-end animate__animated animate__fadeInLeft banner-text lh-sm">
                        {!! $banners[1]->texto_principal !!}
                        </p>
                        <div class="row justify-content-end">
                            <div class="col-12 col-md-6 pt-3 p-0 mx-auto mx-xl-0 text-center text-xl-end d-xl-flex justify-content-center justify-content-xl-end ">
                                @if ($banners[1]->boton > 0)
                                    <a href="https://play.google.com/store/apps/details?id=cl.vgroup.sasi&hl=es_CL&gl=US" target="_blank" class="d-block d-md-inline-block m-0 my-3 my-xl-0 mx-xl-3 ">
                                        <img src="{{ asset('img/Google_play.png') }}" alt="Logo Google play" class="h-25 w-50 w-lg-normal hvr-pulse shadow">
                                    </a>
                                    <a href="https://apps.apple.com/gb/app/sasi-cursos-para-la-vida/id1629511054" target="_blank" class="d-block d-md-inline-block m-0 my-3 my-xl-0 mx-xl-3 ">
                                        <img src="{{ asset('img/App_store.png') }}" alt="Logo App store" class="h-25 w-50 w-lg-normal hvr-pulse shadow">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- NEWSLETTER--}}
    <section class="position-relative">
        <div class="bg-transparent position-absolute" style="height: 69px !important; top:-166px" id="newsletter"></div>
        <div class="container-fluid h-100" style="background-color: #474747">
            <div class="row align-items-center m-0 h-100 my-auto py-5 justify-content-center">
                {{-- <div class="col-10 col-md-7 col-xl-4">
                    <p class="ms-sm-5 fs-5 fw-bold text-center text-xl-start lh-sm text-light">
                        Regístrate en nuestro Newsletter y recibirás un increíble regalo
                    </p>
                </div>
                <div class="col-10 col-md-7 col-xl-3 my-2">
                    <input id="correon" type="mail" class="newsletter-text w-100 rounded-pill border border-1" placeholder="Correo" style="outline: none">
                </div>
                <div class="col-10 col-md-7 col-xl-3 my-2">
                    <input id="nombren" type="text" class="newsletter-text w-100 rounded-pill border border-1" placeholder="Nombre" style="outline: none">
                </div>
                <div class="col-10 col-md-7 col-xl-2 my-2">
                    <button class="hvr-pulse shadow fs-6 rounded-pill btn btn-primary px-5 text-dark w-100 submit-news" type="button" >REGISTRARME</button>
                </div> --}}
            </div>
        </div>
    </section>
    {{-- >>>VIDEO<<< --}}
    <section class="fondo_gris position-relative">
        <div class="bg-transparent position-absolute" style="height: 69px !important; top:-69px" id="video"></div>
        <div class="row align-items-end align-items-lg-center m-0 h-100 my-auto pb-5 pt-md-0">
            <div class="col-12 col-lg-7 pt-5 pt-md-0">
                <p class="fs-2 video-text text-center pt-5">
                    ¿POR QUÉ ESTUDIAR CON SASI?
                </p>
                <div class="p-0 ps-lg-5 pt-lg-5 d-flex align-content-center position-relative">
                    <img class="fondo_video mx-auto p-0 ps-lg-5" src="{{ asset('img/Mancha_fondo_video.png') }}" alt="Formas para fondo video">
                    <img class="w-100 position-absolute notebook" src="{{ asset('img/notebook.png') }}" alt="Notebook">
                    <video id="video_sasi"class="position-absolute video_sasi" src="https://static.vgroup.cl/2022/02/WEB-VGROUP/VIDEO/Sasi_Pagina_web_v2.mp4" controls="" preload="auto"></video>
                    <div id="play-video" class="">
                        <img class="position-absolute video_poster" src="{{ asset('img/poster_video.png') }}" alt="Poster video Sasi">
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
                <ul class="p-0 ps-lg-5 text-center text-lg-start mt-4">
                    <li class="dotless py-2">
                        <p class="fs-3 fw-bolder video-texto">
                            + de 150.000 alumnos felices
                        </p>
                    </li>
                    <li class="dotless py-2">
                        <p class="fs-3 fw-bolder video-texto">
                            Instructores referentes te guiarán
                        </p>
                    </li>
                    <li class="dotless py-2">
                        <p class="fs-3 fw-bolder video-texto">
                            Certificado de participación
                        </p>
                    </li>
                    <li class="dotless py-2">
                        <p class="fs-3 fw-bolder video-texto">
                            Contenido full HD
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <!--modal video-->
    @include('partials.modal_video')
    <!-- fin modal-->

</div>
@endsection
@push('scriptsOpcionales')
<script src="{{ asset('js/modalVideoCursos/videoCurso.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#canonical').attr('href', 'http://sasi.cl');
            $('.tituloSasi').html('Sasi');
        });
        $(".submit-news").click(function(){
            let mailsubs = $("#correon").val();
            let nombresubs = $("#nombren").val();
            var token = '{{ csrf_token() }}';
            if(mailsubs != "" && nombresubs != ""){
                //alert("si llegan los datos: "+mailsubs+" - "+nombresubs+" - "+token);
                $.ajax({
                    url : '/newsreg',
                    data : {
                        email : mailsubs,
                        nombre : nombresubs,
                        _token: token
                    },
                    type : 'Post',
                    dataType : 'json',
                    beforeSend: function() {
                        $(".submit-news").addClass("disabled");
                    },
                    success : function(response) {
                        $(".submit-news").removeClass("disabled");
                        if(response.codigo == 200){
                            swal({
                                title: "Perfecto!",
                                text: "Registro Exitoso.",
                                type: "success",
                                icon: 'success',
                                timer: 4000
                            });
                        }else{
                            swal({
                            title: "Error!",
                            text: "Ya existe una cuenta registrada con ese correo.",
                            type: "error",
                            icon: 'error',
                            timer: 4000
                        });
                        }

                    }
                });
            }else{
                alert("debe llenar los campos");
            }
            //alert(mailsubs+ " - "+nombresubs);
        });
        $('.play_boton').click(function(){
            $('#play-video').addClass("d-none");
            $('#video_sasi').trigger('play');
        });
        var video = $("#video_sasi");
        /* video.get(0).play(); */
        video.on("ended", function() {
            $('#play-video').removeClass("d-none");
        });
        $(".registerbanner").click(function(event){
            event.preventDefault();
            $('.inicio-sesion').addClass("d-none");
            $('.registro').removeClass("d-none")
        })

    </script>
    <script src="{{ asset('js/carrusel.js') }}"></script>
@endpush
