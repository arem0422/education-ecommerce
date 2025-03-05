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
    @include('partials.modal_empresas')
    @if(url()->current() != url('/sasi-para-empresas'))
        @include('partials.publicidad_suscripcion')
    @endif



    {{-- PRIMER BANNER --}}
    <section>
        {{-- imagen del banner --}}

        @isset($banners)
            <div class="hero bEmpresas1" style="background-image: url('{{ asset('storage/'.$banners[0]->imagen_desktop) }}');">
                <style>
                    @media only screen and (max-width: 1200px) {
                        .bEmpresas1 {
                            background-image: url('{{ asset('storage/'.$banners[0]->imagen_movil) }}') !important;
                            background-position: bottom !important;
                        }
                    }
                </style>
                <div class="container-fluid h-100">
                    <div class="row align-items-start align-items-xl-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                        <div class="col-12 col-xl-6 pt-5 pt-md-0">

                            <p class="ms-xl-5 text-center text-xl-start animate__animated animate__fadeInLeft banner-text lh-sm pt-5 mt-5 pt-xl-0 mt-xl-0">
                            {!! $banners[0]->texto_principal !!}
                            </p>
                            {{-- <div class="row ms-lg-5">
                                <div class="col-10 col-md-6 pt-3 text-start p-0 mx-auto mx-lg-0 text-center text-lg-start">
                                    @if ($banners[2]->boton > 0)
                                        <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" onclick="location.href='#'">REGÍSTRATE GRATIS</button>
                                    @endif
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endisset

    </section>
    {{-- BANNER ROBOT--}}
    <section>
        @isset($banners)
            <div class="">
                <div class="container-fluid h-100">
                    <div class="row align-items-end align-items-lg-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                        <div class="col-12 col-lg-7 pt-5 pt-md-0 position-relative">
                            <img class="fondo_video mx-auto p-0 ps-lg-5" src="{{ asset('img/Fondo_sasi_robot.png') }}" alt="Formas para fondo">
                            <img class="sasi-bot position-absolute" src="{{ asset('img/sasi_empresas.png') }}" alt="Sasi Bot">
                        </div>
                        <div class="col-12 col-md-1 col-lg-7 m-0 p-0 d-lg-none"></div>
                        <div class="col-12 col-md-10 col-lg-4 pt-5 pt-md-0">

                            <p class="ms-lg-5 text-center text-lg-start animate__animated animate__fadeInLeft lh-sm pt-0 mt-0 text-gris fs-2 text-shadow">
                            {!! $banners[1]->texto_principal !!}
                            </p>
                            <div class="row ms-lg-5">
                                <div class="col-12 pt-3 text-start p-0 mx-auto mx-lg-0 text-center text-lg-start">
                                    @if ($banners[2]->boton > 0)
                                        <button class="hvr-pulse shadow mt-2 fs-5 fs-sm-6 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Modalempresas" data-bs-subject="Quiero Sasi para mi empresa">QUIERO SASI PARA MI EMPRESA</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </section>
    {{-- BANNER PRODUCTIVIDAD--}}
    <section>
        {{-- imagen del banner --}}

        @isset($banners)
            <div class="hero bEmpresas3" style="background-image: url('{{ asset('storage/'.$banners[2]->imagen_desktop) }}'); background-position: left">
                <style>
                    @media only screen and (max-width: 1200px) {
                        .bEmpresas3 {
                            background-image: url('{{ asset('storage/'.$banners[2]->imagen_movil) }}') !important;
                            background-position: bottom !important;
                            background-attachment: inherit !important;
                        }
                    }
                </style>
                <div class="container-fluid h-100">
                    <div class="row align-items-start align-items-xl-center m-0 h-100 my-auto pb-5 pt-md-0 justify">
                        <div class="col-12 col-md-1 col-xl-7 pt-5 pt-md-0 d-none d-md-block"></div>
                        <div class="col-12 col-md-10 col-xl-4 pt-3 pt-xl-5 mt-xl-5">

                            <p class="ms-xl-5 text-center text-xl-start animate__animated animate__fadeInLeft lh-sm pt-3 pt-xl-5 text-white fs-2 fs-sm-3 text-shadow">
                            {!! $banners[2]->texto_principal !!}
                            </p>
                            {{-- <div class="row ms-lg-5">
                                <div class="col-12 pt-3 text-start p-0 mx-auto mx-lg-0 text-center text-lg-start">
                                    @if ($banners[0]->boton > 0)
                                        <button class="hvr-pulse shadow mt-2 fs-5 fs-sm-6 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" onclick="location.href='#'">QUIERO SASI PARA MI EMPRESA</button>
                                    @endif
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endisset

    </section>
    {{-- PORQUE NOS ELIGEN --}}
    <section class="bg-gris position-relative">
        <div class="bg-transparent position-absolute" style="height: 69px !important; top:-75px" id='por_que_nos_eligen'></div>
        <div class="row m-0 h-100 my-auto py-5">
            <div class="col-12 col-lg-6 pt-5 pt-md-0">
                <p class="fs-2 fs-sm-3 text-primario ms-lg-5 ps-4 ps-lg-5 text-shadow fw-bold">¿Por qué nos eligen las empresas?</p>
                <div class="row ms-4 ms-lg-5 ps-0 ps-lg-5 mt-5">
                    <div class="col-12 col-md-6 text-white fs-5 p-0 m-0 pe-3">
                        <ul>
                            <li><p>Nuestro catálogo de cursos <span class="text-primario">crece semanalmente.</span></p></li>
                            <li><p>En Sasi tus colaboradores podrán crecer tanto en ámbito <span class="text-primario"> profesional como personal.</span></p></li>
                            <li><p>Puedes usar la plataforma Sasi para <span class="text-primario">centralizar otros contenidos</span> y disponibilizar todos tus programas en un solo lugar.</p></li>
                        </li>



                    </div>
                    <div class="col-12 col-md-6 text-white fs-5 p-0 m-0 ps-md-4 pe-4 pe-lg-0 mb-5">
                        <ul>
                            <li><p><span class="text-primario">¡Tendrás el control!</span> Monitorea el avance y resultados de tus colaboradores con nuestro panel de administrador y gestiona tú mismo los accesos de nuevos usuarios.</p></li>
                            <li><p>Puedes financiar todo a través de <span class="text-primario">Franquicia tributaria SENCE.</span></p></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-5 ms-3 ">
                <div class="p-0 ps-lg-5 pt-lg-5 d-flex align-content-center position-relative">
                    <img class="fondo_video mx-auto p-0 ps-lg-5" src="{{ asset('img/Mancha_Fondo_celular.png') }}" alt="Formas para fondo">
                    <img class="w-75 position-absolute celular" src="{{ asset('img/celular_con_app.png') }}" alt="celular con app">
                </div>

            </div>
        </div>
    </section>
    {{-- CURSOS EMPRESAS --}}
    <section class="fondo_gris">
        <div class="{{-- grid --}} row">
            <div class="col-12 mt-5">
            </div>
            <div class="col-12 col-md-11 col-lg-5 mb-4">
                <p class="fs-3 fs-sm-3 text-gris ms-md-5 ps-4 ps-md-5 text-shadow">Tenemos más de <span class="fw-bold">50 cursos</span> prácticos, dinámicos y lúdicos para hacer desde cualquier dispositivo móvil con o sin internet</p>
                <p class="fs-3 fs-sm-3  text-gris ms-md-5 ps-4 ps-md-5 text-shadow"><span class="fw-bold">En un solo lugar,</span> tendrás la diversidad de temas que tus colaboradores necesitan</p>
            </div>
            <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center">
                @isset($productos)
                    @for ($i=0; $i<6; $i++)
                        {{-- <div class="product-item element-item @isset($producto->categorias) @foreach ($productos[0]->categorias as $cat) {{ str_replace('.', '',$cat) }} @endforeach @endisset mx-3 p-0 col-3" data-category=".all @isset($productos[0]->categorias) @foreach ($productos[0]->categorias as $cat) {{ $cat }} @endforeach @endisset"> --}}
                        <div class="card-Prod-2 m-2 bg-light">
                            <div class="gridProd position-relative">
                                <img class="imgProducto w-100" src="{{ url('storage/'.$productos[$i]->imagen_producto) }}" alt="{{ $productos[$i]->nombre_producto }}">
                            </div>
                            <div class="infoProducto w-100">
                                <div class="nombreProd">
                                    <a class="nombre_curso" href="" title="">
                                        <h2>{{ $productos[$i]->nombre_producto }}</h2>
                                    </a>
                                </div>
                                <div class="nombreProfe">
                                    <h4 class="Profe">{{ $productos[$i]->nombre_profesor }}</h4>
                                </div>
                            </div>
                            {{-- <div class="precioDescuento">
                                <h3 class="text-decoration-line-through"> ${{ $productos[2]->precio_anterior }}</h3>
                            </div>
                            <div class="precioProducto">
                                <h3> $ {{ $productos[2]->precio }}</h3>
                            </div> --}}

                            <div class="px-3">
                                <a href="#" class="w-100 text-decoration-none m-0 p-0" data-bs-toggle="modal" data-bs-target="#Modalempresas" data-bs-subject="{{ $productos[$i]->nombre_producto }}">
                                    <p class="w-100 hvr-pulse bg-primario btn py-1 icon-send shadow fs-6 fw-bold text-light">
                                        <span class="fs-8">¡Contactanos!</span>
                                    </p>
                                </a>
                            </div>

                        </div>
                    @endfor
                @endisset
                <div class="mb-5 mt-3">
                    <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" onclick="location.href='/cursos'">VER MÁS</button>
                </div>
            </div>

        </div>
    </section>
    {{-- SUSCRIPCION --}}
    <section class="bg-gris position-relative">
        <div class="bg-transparent position-absolute" style="height: 69px !important; top:-69px" id="suscripcion_empresas"></div>
        <div class="row m-0 h-100 my-auto py-5 mx-3 mx-lg-5 px-2 px-lg-5 ">
            <div class="col-12 col-xl-6 pt-md-0 position-relative">
                <img class="position-absolute puntos-titulos" src="{{ asset('img/Grupo_427.png') }}" alt="Formas para fondo de letras">
                <p class="position-relative fs-2 fs-sm-3 text-white text-shadow fw-bold">
                    Accede a cursos ilimitados todo el año <br>
                    <span class="text-primario">Suscripción anual SASI empresas</span><br>
                    <span class="text-white">Financia con SENCE</span>
                </p>
            </div>
            <div class="col-12 col-xl-6"></div>
            {{-- card de suscripcion --}}
            <div class="col-12 col-md-6 col-xl-3 px-4 pt-5 mt-5">
                <div class="card-suscripcion text-center position-relative">
                    <p class="fs-5 text-white mt-3">100 accesos</p>
                    <p class="fs-2 fw-bold text-primario m-0">$8.200 p/p</p>
                    <p class="fs-6 fw-bold text-primario ps-5 ms-5">mensual</p>
                    <p class="fs-5 fw-bold text-primario">$98.400 precio anual</p>
                    <ul class="fs-6 ps-5 text-white text-start">
                        <li>Gestión de accesos</li>
                        <li>Seguimiento de alumno</li>
                        <li>Certificados incluidos</li>
                        <li>Envío de mails con nuevos lanzamientos</li>
                    </ul>
                    <div class="mb-5 mt-5 position-absolute bottom-0 w-100">
                        <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Modalempresas" data-bs-subject="Suscripción empresas $8200">CONTRATAR</button>
                    </div>
                </div>
            </div>
            {{-- card de suscripcion --}}
            <div class="col-12 col-md-6 col-xl-3 px-4 pt-5 mt-5">
                <div class="card-suscripcion text-center position-relative">
                    <p class="fs-5 text-white mt-3">300 accesos</p>
                    <p class="fs-2 fw-bold text-primario m-0">$6.500 p/p</p>
                    <p class="fs-6 fw-bold text-primario ps-5 ms-5">mensual</p>
                    <p class="fs-5 fw-bold text-primario">$78.000 precio anual</p>
                    <ul class="fs-6 ps-5 text-white text-start">
                        <li>Gestión de accesos</li>
                        <li>Seguimiento de alumno</li>
                        <li>Certificados incluidos</li>
                        <li>Envío de mails con nuevos lanzamientos</li>
                    </ul>
                    <div class="mb-5 mt-5 position-absolute bottom-0 w-100">
                        <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Modalempresas" data-bs-subject="Suscripción empresas $6500" >CONTRATAR</button>
                    </div>
                </div>
            </div>
            {{-- card de suscripcion --}}
            <div class="col-12 col-md-6 col-xl-3 px-4 pt-5 mt-5">
                <div class="card-suscripcion text-center position-relative">
                    <p class="fs-5 text-white mt-3">500 accesos</p>
                    <p class="fs-2 fw-bold text-primario m-0">$5.100 p/p</p>
                    <p class="fs-6 fw-bold text-primario ps-5 ms-5">mensual</p>
                    <p class="fs-5 fw-bold text-primario">$61.200 precio anual</p>
                    <ul class="fs-6 ps-5 text-white text-start">
                        <li>Panel de control</li>
                        <li>Gestión de accesos</li>
                        <li>Seguimiento de alumno</li>
                        <li>Certificados incluidos</li>
                        <li>Envío de mails con nuevos lanzamientos</li>
                        <li>Atención personalizada</li>
                        <li>Invitación a Webinars</li>
                    </ul>
                    <div class="mb-5 mt-5 position-absolute bottom-0 w-100">
                        <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Modalempresas" data-bs-subject="Suscripción empresas $5100" >CONTRATAR</button>
                    </div>
                </div>
            </div>
            {{-- card de suscripcion --}}
            <div class="col-12 col-md-6 col-xl-3 px-4 pt-5 mt-5">
                <div class="card-suscripcion text-center position-relative">
                    <p class="fs-5 text-white mt-3">1000 accesos</p>
                    <p class="fs-2 fw-bold text-primario m-0">$4.100 p/p</p>
                    <p class="fs-6 fw-bold text-primario ps-5 ms-5">mensual</p>
                    <p class="fs-5 fw-bold text-primario">$49.200 precio anual</p>
                    <ul class="fs-6 ps-5 text-white text-start">
                        <li>Panel de control</li>
                        <li>Gestión de accesos</li>
                        <li>Seguimiento de alumno</li>
                        <li>Certificados incluidos</li>
                        <li>Envío de mails con nuevos lanzamientos</li>
                        <li>Atención personalizada</li>
                        <li>Invitación a Webinars</li>
                    </ul>
                    <div class="mb-5 mt-5 position-absolute bottom-0 w-100">
                        <button class="hvr-pulse shadow mt-2 fs-5 fw-normal px-5 py-3 rounded-pill lh-1 btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Modalempresas" data-bs-subject="Suscripción empresas $4100">CONTRATAR</button>
                    </div>
                </div>
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
    <script>
        $('#canonical').attr('href', 'http://sasi.cl/empresas');
        $('.tituloSasi').html('Sasi para empresas')
        $(document).ready(function() {
            $('#Modalempresas').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var clickmotivo = button.data('bs-subject') // Extract info from data-* attributes
            $("#subject").val("");
            $("#subject").val(clickmotivo);
            })
            $("#contactoForm").submit(function(e){
                e.preventDefault();
                let a = $('#nombreContacto').val();
                let b =$('#nombreEmpresa').val();
                let c =$('#mailEmpresa').val();
                let d =$('#fonoEmpresa').val();
                let f =$('#motivoEmpresa').val();
                let g =$("#subject").val();
                //console.log("submitea formulario");
                //$("#Modalnegocios").modal('hide');
                var url = "";
                var text = "nombre - telefono - empresa - email - motivo ";
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: 'payload=' + JSON.stringify({

                            "blocks": [
                                {
                                    "type": "header",
                                    "text": {
                                        "type": "plain_text",
                                        "text": "Nuevo Contacto",
                                        "emoji": true
                                    }
                                },
                                {
                                    "type": "section",
                                    "fields": [
                                        {
                                            "type": "mrkdwn",
                                            "text": "*Nombre de Contacto :*\n"+a,
                                        },
                                        {
                                            "type": "mrkdwn",
                                            "text": "*Nombre Empresa:*\n"+b,
                                        }
                                    ]
                                },
                                {
                                    "type": "divider"
                                },
                                {
                                    "type": "section",
                                    "fields": [
                                        {
                                            "type": "mrkdwn",
                                            "text": "*Email:*\n"+c,
                                        },
                                        {
                                            "type": "mrkdwn",
                                            "text": "*Teléfono:*\n"+d,
                                        }
                                    ]
                                },
                                {
                                    "type": "divider"
                                },
                                {
                                    "type": "section",
                                    "fields": [
                                        {
                                            "type": "plain_text",
                                            "text": "Motivo de su contacto:"+f+"-"+"Click en: "+g,
                                            "emoji": false
                                        }
                                    ]
                                }
                            ]

                    }),
                    dataType: 'json',
                    processData: false,
                    complete : function(xhr, status) {
                        $('#Modalempresas').modal('toggle');
                        $('#contactoForm')[0].reset();
                        swal({
                            title: "Te contactaremos a la brevedad posible.",
                            type: "success",
                            icon: 'success',
                            timer: 4000
                        });
                    }
                });
                //falta integrar hoock slack
            });
        });
    </script>
@endpush
