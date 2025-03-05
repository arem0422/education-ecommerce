@extends('layouts.nav')
@push('cssOpcionales')
    <link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito/producto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil/recomendaciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil/progress.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/carrousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/cursosHome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.6.0/tiny-slider.css">
@endpush

@section('content')
    {{-- Info de perfil --}}
    <div class="row ms-lg-5 ps-lg-5 mx-2 mt-4">
        <div class="col-4 col-lg-3 col-xl-2">
            <div class="rounded-circle img-perfil shadow position-relative divCambiarImagenPerfil"
                onclick="event.preventDefault();document.getElementById('fileinputSelectImageProfile').click();"
                style="background-image: url('{{ $infoalumno->imgPerfil ? $infoalumno->imgPerfil : 'https://static.vgroup.cl/img/img-perfil/img-alumno-1-1585685778.png	' }}');">
                <a href="#"
                    class="boton-foto border border-3 bg-primario text-decoration-none icon-camera fs-6 rounded-circle p-2 position-absolute"></a>
            </div>
            <input type="file" id="fileinputSelectImageProfile" class="d-none" />
        </div>
        <div class="col-11 col-sm-4 col-lg-3 col-xl-2 mx-3 ">
            <div class="mt-3">
                <p class="fs-6 fw-bold m-0 mb-1 text-uppercase">{{ $infoalumno->nombre ? $infoalumno->nombre : 'N/A' }} -
                    {{ $infoalumno->apellido ? $infoalumno->apellido : 'N/A' }}</p>
                <p class="fs-6 fw-bold m-0 mb-1 ">{{ $infoalumno->email ? $infoalumno->email : 'N/A' }}</p>
                <p class="fs-6 fw-bold m-0 mb-1">
                    {{ $infoalumno->fecha_nacimiento ? $infoalumno->fecha_nacimiento : 'N/A' }}</p>
                <p class="fs-6 fw-bold m-0 mb-1">{{ $infoalumno->telefonoMovil ? $infoalumno->telefonoMovil : 'N/A' }}</p>
                <button type="submit" class="mt-2 btn bg-primario w-100 hvr-pulse rounded rounded-pill shadow-sm"
                    data-bs-toggle="modal" data-nombre="{{ $infoalumno->nombre ?? '' }}"
                    data-apellido="{{ $infoalumno->apellido ?? '' }}"
                    data-fecha_nacimiento="{{ $infoalumno->fecha_nacimiento ?? '' }}"
                    data-telefonomovil="{{ $infoalumno->telefonoMovil ?? '' }}"
                    data-idalumno="{{ $infoalumno->idAlumno }}" data-bs-target="#Modalperfil">EDITAR MI PERFIL</button>
                {{-- <a href="{{ route('historial-compras') }}"><span class="mt-2 btn bg-primario w-100 hvr-pulse rounded rounded-pill shadow-sm">HISTORIAL DE COMPRAS</span></a> --}}
            </div>
        </div>

    </div>
    <hr class="mt-4" id="mis_cursos">
    {{-- Mis Cursos --}}
    <div class="row ms-lg-5 ps-lg-5 mx-2 my-4">
        <div class="col-12 p-0 mb-3">
            <h1 class="fs-3 fw-bold">Mis cursos</h1>
        </div>
        <div class="col-12 col-lg-11 p-0 mb-3 text-end">
            <div class="btn-group" role="group" aria-label="Basic example" id="filters">
                {{--   <button type="button" class=" btn btn-primary bg-primario text-dark border border-0 py-2 hvr-pulse shadow-sm " data-filter="*" id="btn-todos">Todos</button> --}}
                <button type="button"
                    class="ms-1 btn btn-primary bg-primario text-dark border border-0 py-2 hvr-pulse shadow-sm fs-8 is-checked lh-1"
                    data-filter=".filter-CA" id="btn-CA">Continúa Aprendiendo</button>
                <button type="button"
                    class="ms-1 btn btn-primary bg-primario text-dark border border-0 py-2 hvr-pulse shadow-sm fs-8 lh-1"
                    data-filter=".filter-AN" id="btn-AN">Aprende algo nuevo</button>
                <button type="button"
                    class="ms-1 btn btn-primary bg-primario text-dark border border-0 py-2 hvr-pulse shadow-sm fs-8 lh-1"
                    data-filter=".filter-VV" id="btn-VV">Volver a ver</button>
            </div>
        </div>
        <div class="col-12 col-lg-11 grid">
            @isset($listacursos)
                @foreach ($listacursos as $miscursos)
                    <div
                        class="overflow-hidden row bg-white rounded mb-4 curso mis-cursos-item me-1 w-100 {{ $miscursos->filtro }}">
                        {{-- imagen del curso --}}
                        <div class="col-12 col-sm-4 col-lg-3 p-0 m-0 img-curso rounded-start bg-dark"
                            style="background-image: url('{{ $miscursos->imgPortada }}');">
                        </div>
                        {{-- Info del curso --}}
                        <div class="col-12 col-sm-8 col-lg-9 ps-3 pt-3 d-flex align-items-start flex-column">
                            {{-- Progress circle --}}
                            <div class="position-absolute progreso m-0 p-0">
                                <div id="cont" data-pct="{{ $miscursos->avanceCurso }}" class="text-center">
                                    <svg id="svg" width="90" height="90" viewPort="0 0 90 90"
                                        data-avance="{{ $miscursos->avanceCurso }}" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle r="30" cx="35" cy="35" fill="transparent"
                                            stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                                        <circle id="bar" r="30" cx="35" cy="35" fill="transparent"
                                            stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                                    </svg>
                                </div>
                            </div>
                            <a class="text-decoration-none me-5" href="" title="">
                                <p class="fs-6 lh-1 fw-bold text-dark mb-2 me-3">{{ $miscursos->tituloCurso }}</p>
                            </a>
                            <p class="fs-6 m-0 fw-bold texto-productos">
                                {{ isset($miscursos->nombreProfesor) ? $miscursos->nombreProfesor->nombre . ' ' . $miscursos->nombreProfesor->apellido : '' }}
                            </p>
                            <p class="fs-6 m-0 fw-bold my-3 texto-productos descripcion-curso text-white">
                                a
                            </p>
                            <div class="mt-auto w-100 text-center my-3">
                                <a href="/loginSuplantar/{{ $miscursos->idCurso }}/{{ $infoalumno->idAlumno }}"
                                    target="_blank">
                                    <button type="button"
                                        class="btn bg-primario hvr-pulse rounded rounded-pill shadow-sm px-4">IR AL
                                        CURSO</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>

    </div>

    {{-- Recomendaciones --}}
    @isset($productos)
    {{-- @dd($productos) --}}
    @if (count($productos) > 1)

        <div class="{{-- c-product-tray --}} row mx-2 px-0 mx-lg-5 px-lg-5 my-4 justify-content-center">
            <div class="col-12 p-0 mb-5">
                <h1 class="fs-3 fw-bold">RECOMENDACIONES PARA TI:</h1>
            </div>

            <div class="col-12{{--  col-lg-11  --}}m-0 p-0">

                <div class="c-product-tray__carousel">

                    <div class="o-slider-product-tray">

                        <div class="o-slider-product-tray__controls js-controls">

                            <button class="o-slider-product-tray__button o-slider-product-tray__button--prev"
                                style="z-index: 1000">
                                <div class='nav__prev'><i
                                        class="fas fs-3 fw-normal py-3 px-2 text-white icon-chevron-left"></i></div>
                            </button><!-- /o-slider-product-tray__button -->

                            <button class="o-slider-product-tray__button o-slider-product-tray__button--next"
                                style="z-index: 1000">
                                <div class='nav__next'><i
                                        class="fas fs-3 fw-normal py-3 px-2 text-white icon-chevron-right"></i></div>
                            </button><!-- /o-slider-product-tray__button -->

                        </div><!-- /o-slider-product-tray__controls -->


                        <ul class="o-slider-product-tray__inner js-slider-product-tray">


                            @foreach ($productos as $key => $item)
                                <li class="o-slider-product-tray__slide">
                                    <div class="w-100 prod-reco mx-1 bg-light rounded rounded-card">
                                        <div class=" position-relative">
                                            <img class="imgProducto-2 w-100"
                                                src="{{ url('storage/' . $item->imagen_producto) }}" alt="{{ $item->nombre_producto }}">
                                            {{-- <div class="hover-outer imgProducto w-100 position-absolute top-0">
                                        <a href="#" class="linkVideo d-flex align-items-center justify-content-center mx-auto text-decoration-none position-absolute play">
                                            <div class="icon-play fs-4" ></div>
                                        </a>
                                    </div> --}}
                                        </div>
                                        <div class="infoProducto w-100">
                                            <div class="nombreProd">
                                                <a class="nombre_curso" href="" title="">
                                                    <h2>{{ $item->nombre_producto }}</h2>
                                                </a>
                                            </div>
                                            <div class="nombreProfe">
                                                <h4 class="Profe">{{ $item->nombre_profesor }}</h4>
                                            </div>
                                        </div>
                                        <div class="precioDescuento">
                                            <h3 class="text-decoration-line-through"> ${{ $item->precio_normal }}</h3>
                                        </div>
                                        <div class="precioProducto">
                                            <h3> $ {{ $item->precio }}</h3>
                                        </div>
                                        <div class="mb-1">
                                            <div class="mt-1 px-3">
                                                <a href="/detalle-curso/{{ $item->sku }}"
                                                    class="w-100 text-decoration-none text-dark m-0 p-0">
                                                    <p
                                                        class="w-100 hvr-pulse bg-primario btn py-1 icon-send shadow fs-8 fw-bold">
                                                        <span>Ver Información</span>
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </li><!-- /o-slider-product-tray__slide-->
                            @endforeach



                        </ul><!-- /o-slider-product-tray__inner -->

                    </div><!-- /o-slider-product-tray -->

                </div><!-- /c-product-tray__carousel -->

            </div><!-- /o-wrapper -->

        </div><!-- /c-product-tray -->
    @endif
    @endisset

    @include('partials.modal_perfil')

@endsection
@push('scriptsOpcionales')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.6.0/min/tiny-slider.js"></script>
    <script src="https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/progress.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/isotop-mis-cursos/mis-cursos.js') }}"></script>
    <script src="{{ asset('js/profile-pic.js') }}"></script>
    <script>
        $('#canonical').attr('href', 'http://sasi.cl/perfil');
        $('.tituloSasi').html('Sasi perfil de usuario');
    </script>
@endpush
