@extends('layouts.nav')
@push('cssOpcionales')
    <link rel="stylesheet" href="{{ asset('css/cursos/detalleCurso.css') }}">
    <link rel="stylesheet" href="{{ asset('css/banners.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/video.css') }}">
@endpush
@section('content')
    @include('partials.modal_caja')
    @isset($productos)
        <div class="m-0 p-0">
            <!--Inicio Video y Contenido-->
            <div class="row m-0 p-0 w-100">
                <div class="col-12 video-layout m-0 p-0">
                    <div class="ratio ratio-16x9 position-relative">
                        <iframe class="embed-responsive-item videoProd w-100"
                            src="{{ $productos->url_video }}?controls=false&autoplay=true&muted=1" frameborder="0"
                            allowfullscreen=""></iframe>
                        <div class="h-100 w-100 bg-dark opacidad-05 position-absolute">
                        </div>
                    </div>
                    <div class="row informacion-curso position-absolute top-0 m-0 w-100 px-5">
                        <div class="col-12 mt-10">
                            <p class="banner-text m-0 p-0" id="text-cambio1">{{ $productos->nombre_producto }}</p>
                            @if($productos->precio !== "0")
                                <p class="banner-text mb-3" id="text-cambio2"> $ {{ $productos->precio }}</p>
                            @endif
                            <div class="w-50 contenedor-descripcion mb-3" style="color: white !important;">
                                <p class="descripcionP m-0 p-0 fs-6 lh-base text-white pe-3">{!! $productos->descripcion !!}</p>
                            </div>
                            <div class="btn-group- my-3 ms-3 ms-sm-0 text-start text-sm-center text-lg-start">
                                <div class="p-0 m-0">
                                    <span
                                        class="hvr-pulse shadow mt-2 fs-5 fw-bold px-5 py-3 rounded-pill lh-1 btn btn-primary btnComprar"
                                        data-idlms="{{ $productos->id_lms }}" data-id="{{ $productos->id }}"
                                        data-img="{{ $productos->imagen_producto }}"
                                        data-price="$ {{ $productos->precio }}" data-pname="{{ $productos->nombre_producto }}"
                                        data-panterior="{{ $productos->precio_anterior }}"
                                        data-profname="{{ $productos->nombre_profesor }}">
                                        @if($productos->precio === "0")
                                            <span class="icon-shopping-cart"></span> inscríbete ahora!</span>
                                        @else
                                            <span class="icon-shopping-cart"></span> Comprar Ahora!</span>
                                        @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Fin Video y Contenido-->

            <div class="contenido-curso row m-0 w-100 ps-3 ps-lg-5">
                <!--Inicio del Contenido Curso-->
                <div class="col-12">
                    <p class="fs-3 mt-4 mb-4 fw-bold video-text">¿Por qué hacer este curso?</p>
                </div>
                <div class="col-12 col-lg-8 mb-5 row">

                    <div class="ratio ratio-16x9 position-relative mb-4" {{-- style="--bs-aspect-ratio: 57%;" --}}>
                        <iframe class="embed-responsive-item videoProd" src="{{ $productos->url_video }}" frameborder="0"
                            allowfullscreen=""></iframe>

                    </div>
                    <p class="descripcionVideo ps-2 m-0 p-0 fs-6 mb-4 lh-base">{{ $productos->que_aprenderas }}</p>
                    <div>
                        <p class="fs-3 mt-4 mb-4 fw-bold video-text">Contenido del Curso</p>
                        <p class=" m-0 p-0 fs-6 lh-base mb-4">{!! $productos->modulos !!}</p>
                        <p class="fs-3 mt-4 mb-4 fw-bold video-text">¿A quién está dirigido?</p>
                        <p class=" m-0 p-0 fs-6 lh-base mb-4">{{ $productos->dirigido }}</p>
                        <p class="fs-3 mt-4 mb-4 fw-bold video-text">¿Qué necesito para hacer este curso?</p>
                        <p class=" m-0 p-0 fs-6 lh-base dirigidoP mb-4">{{ $productos->requisitos }}</p>
                    </div>
                    @if ($productos->nombre_profesor != '' && $productos->nombre_profesor != null)
                    <div class="col-9 col-lg-3">
                            <img src="{{ $productos->imagen_profesor }}" alt="{{ $productos->nombre_profesor }}"
                            class="img-profesor rounded-circle mt-3 "
                            style="background-image: url({{ $productos->imagen_profesor }}), url(https://static.vgroup.cl/2022/06/VGROUP/perfil_image_avatar.jpg);">
                    </div>
                    <div class="col-9">
                            <p class="fs-3 mb-2 fw-bold video-text">Profesor</p>
                            <p class=" m-0 p-0 fs-6 lh-base">
                            <p class="fw-bold" style="display: contents;">{{ $productos->nombre_profesor }}</p>
                            {{ $productos->descripcion_profesor }}</p>
                    </div>
                    @endif

                    <div>
                        <p class="fs-3 mt-4 mb-4 fw-bold video-text">¿Cuándo inicia el curso?</p>
                        <p class=" m-0 p-0 fs-6 lh-base mb-4">Todo el contenido de este curso es 100% online, con clases a las
                            que tendrás acceso luego de la compra del curso. Puedes iniciarlo y desarrollarlo en los tiempos y
                            lugar que más te acomode, y volver a verlo cuantas veces quieras.</p>
                    </div>
                </div>
                <!--Fin del Contenido Curso-->
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    <!--Inicio Cart de Compra-->
                    <div class="comprarCurso">
                        @if($productos->precio !== "0")
                            <p class="fs-1 fw-bold pt-4  value text-center mb-0"> CLP $ {{ $productos->precio }}</p>
                            <p class="text-decoration-line-through text-center mb-4 value fs-6 m-0 p-0 precioDescuento fw-bold">
                                Antes: $ {{ $productos->precio_anterior }}</p>
                        @else
                                <br>
                                <p class="fs-1 fw-bold pt-4  value text-center mb-0"> Curso Gratuito</p>
                        @endif

                        <ul class="text-dark mb-4 mt-4 text-center p-0" style="list-style:none;">
                            <li class="">100% Online a tu ritmo</li>
                            {{-- <li class="">8 Sesiones</li> --}}
                            <li class="">Certificado de participación</li>
                            <li class="">Acceso de por vida</li>
                            <li class="">Garantía de reembolso</li>
                        </ul>
                        <div class="btn-group- text-center">
                            <div class="p-0 m-0">
                                <span
                                    class="hvr-pulse shadow fs-6 fw-bold px-5 py-3 rounded-pill lh-1 btn btn-primary btnComprar"
                                    data-idlms="{{ $productos->id_lms }}" data-id="{{ $productos->id }}"
                                    data-img="{{ $productos->imagen_producto }}"
                                    data-price="$ {{ $productos->precio }}" data-pname="{{ $productos->nombre_producto }}"
                                    data-panterior="{{ $productos->precio_anterior }}"
                                    data-profname="{{ $productos->nombre_profesor }}" type="button">
                                    @if($productos->precio === "0")
                                        <span class="icon-shopping-cart"></span> inscríbete ahora!</span>
                                    @else
                                        <span class="icon-shopping-cart"></span> Comprar Ahora!</span>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <!--Fin cart de Compra-->
                </div>
            </div>
        </div>
    @endisset
@endsection
@push('scriptsOpcionales')
    <script>
        $(document).ready(function() {

            let nombreCurso = $('#text-cambio1').text();
            $('#canonical').attr('href', 'http://sasi.cl/detalle-curso');
            $('.tituloSasi').html(nombreCurso);

            let idCursoLms;
            let idCursoSasi;

            $('.btnInscribir').click(function() {
                idCursoLms = $(this).data('idlms');
                idCursoSasi = $(this).data('id');
            });
        });
    </script>
@endpush
