@extends('layouts.nav')
@push('cssOpcionales')
    <link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
    <style>
        .btnComprar {
            display: initial !important;
        }

        .quicksearch::placeholder {
            color: rgba(59, 53, 53, .4)
        }

        .quicksearch:focus::placeholder {
            padding: .1rem .6rem;
            color: rgba(59, 53, 53, .4)
        }

        .icon-search2 {
            top: 25%;
            right: 27%;
            color: rgba(59, 53, 53, .4)
        }
    </style>
@endpush

@section('content')
    <div class="m-0 p-0 overflow-auto">
        <br>
        <div class="row container-fluid">
            <div class="col-10">
                {{--            <h3 class="titulo ms-0 ms-md-5 lg-md-3 fs-3 fw-bold">Aprendizaje + entretención</h3> --}}
                <h3 class="titulo ms-0 ms-md-5 lg-md-3 fs-4 fw-normal">Cursos Sasi</h3>
            </div>
            <div class="col-2 dropdown d-xl-none text-center">
                <button class="btn btn-secondary dropdown-toggle icon-filter border-0 bg-transparent text-dark fs-2"
                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><button class="filtrobtn2 button btnCat" data-filter="*">Todos</button></li>
                    @isset($categorias)
                        @foreach ($categorias as $categoria)
                            <li><button class="filtrobtn2 button btnCat text-nowrap {{-- @isset($prefilter) {{ $prefilter == $categoria->url ? 'is-checked':''}} @endisset --}}"
                                    data-filter=".{{ str_replace(' ', '_', $categoria->name) }}">{{ __($categoria->name) }}</button>
                            </li>
                        @endforeach
                    @endisset

                </ul>
            </div>
        </div>
        <hr class="linea2">
        <div class="row m-0 p-0 w-100">
            <div class="col-3 ps-5 category-list d-none d-xl-block ">
                <div class="p-0 mb-3 position-relative ps-2">
                    <input type="text" class="quicksearch rounded-pill border border-1 w-75 fs-6 ps-3 py-2"
                        placeholder="Buscar..." style="outline: none; box-shadow: 2px 4px 10px rgb(221 221 221) inset;" />
                    <span class="icon-search2 fs-4 position-absolute"></span>
                </div>
                <h4 class="categorias ps-3"> Categorias </h4>
                <div class="button-group filters-button-group filtros ps-2">
                    <button
                        class="button btnCat  @isset($prefilter) {{ $prefilter ? '' : 'is-checked' }} @endisset"
                        id="btnFiltro" data-filter="*">Todos los cursos</button>
                    @isset($categorias)
                        <button
                            class="button btnCat text-nowrap @isset($prefilter) {{ $prefilter == $categorias[1]->url ? 'is-checked' : '' }} @endisset"
                            id="btnFiltro"
                            data-filter=".{{ str_replace(' ', '_', $categorias[1]->name) }}">{{ __('Descuentos') }}</button>
                        <button
                            class="button btnCat text-nowrap @isset($prefilter) {{ $prefilter == $categorias[2]->url ? 'is-checked' : '' }} @endisset"
                            id="btnFiltro"
                            data-filter=".{{ str_replace(' ', '_', $categorias[2]->name) }}">{{ __('Sasi Kids') }}</button>
                        <button
                            class="button btnCat text-nowrap @isset($prefilter) {{ $prefilter == $categorias[3]->url ? 'is-checked' : '' }} @endisset"
                            id="btnFiltro" data-filter=".{{ str_replace(' ', '_', $categorias[3]->name) }}">Gratuitos</button>
                        <button
                            class="button btnCat text-nowrap @isset($prefilter) {{ $prefilter == $categorias[0]->url ? 'is-checked' : '' }} @endisset"
                            id="btnFiltro"
                            data-filter=".{{ str_replace(' ', '_', $categorias[0]->name) }}">{{ __('Área Salud') }}</button>
                    @endisset
                </div>
                <hr class="linea">
            </div>
            <div class="col-12 col-xl-9 ps-xl-5 pe-0">
                <div class="grid m-0 p-0 ">
                    @isset($productos)
                        @foreach ($productos as $producto)
                            <div class="product-item element-item @isset($producto->categorias) @foreach ($producto->categorias as $cat) {{ str_replace('.', '', $cat) }} @endforeach @endisset mx-2 p-0"
                                data-category=".all @isset($producto->categorias) @foreach ($producto->categorias as $cat) {{ $cat }} @endforeach @endisset">
                                <!--grid producto-->
                                <div class="gridProd position-relative">
                                    <img class="imgProducto w-100" src="{{ $producto->imagen_producto }}"
                                        alt="{{ $producto->nombre_producto }}">
                                    @if (in_array('.Populares', $producto->categorias))
                                        <div class="position-absolute start-0 top-0">
                                            <h1 class="bg-primario text-dark px-3 py-1 fs-6 rounded-3 shadow text-light">Curso
                                                destacado
                                            </h1>
                                        </div>
                                    @endif

                                </div>
                                <div class="hover-info" data-hoverid="{{ $producto->id }}">
                                    <div class="infoProducto w-100">
                                        <div class="nombreProd">
                                            <a class="nombre_curso fs-movil-2"
                                                href="{{ route('Detalle', ['sku' => $producto->sku]) }}" title="">
                                                <h2 class="card-title">{{ $producto->nombre_producto }}</h2>
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
                                </div>
                                <div class="row mt-3 px-4">
                                    <a href="#" class="w-100 btnComprar text-decoration-none text-dark m-0 p-0"
                                        data-idlms="{{ $producto->id_lms }}" data-id="{{ $producto->id }}"
                                        data-img="{{ $producto->imagen_producto }}" data-price="$ {{ $producto->precio }}"
                                        data-pname="{{ $producto->nombre_producto }}"
                                        data-panterior="{{ $producto->precio_anterior }}"
                                        data-profname="{{ $producto->nombre_profesor }}">
                                        <p
                                            class="w-100 hvr-pulse bg-primario btn py-1 icon-shopping-cart shadow fs-8 fw-bold text-light">
                                            <span>¡Inscribete ya!</span>
                                        </p>
                                    </a>
                                </div>

                            </div>
                            <!--fingrid producto-->
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
        <!--modal video-->
        @include('partials.modal_video')
        <!-- fin modal-->
    </div>
@endsection
@push('scriptsOpcionales')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"
        integrity="sha512-E/yP5UiPXb6VelX+dFLuUD+1IZw/Kz7tMncFTYbtoNSCdRZPFoGN3jZ2p27VUxHEkhbPiLuZhZpVEXxk9wAHCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/isotopCursos/cursos.js') }}"></script>
    <script src="{{ asset('js/modalVideoCursos/videoCurso.js') }}"></script>
    @isset($prefilter)
        <script>
            var $grid = $('.grid').isotope({});
            let filtercat = {!! json_encode($prefilter) !!};
            if (filtercat == "*") {
                $grid.isotope({
                    filter: "*"
                });
            } else {
                let filtro = "." + filtercat;
                $grid.isotope({
                    filter: filtro + ".product-item:not(.hide-this-item)"
                });
            }
        </script>
    @endisset
    <script>
        $('#canonical').attr('href', 'http://sasi.cl/cursos');
        $('.tituloSasi').html('Sasi Cursos');

        $('.filtrobtn2').click(function() {
            var filterValue = $(this).attr('data-filter');

            $grid.isotope({
                filter: filterValue + ":not(.hide-this.item)",
                layoutMode: "fitRows"
            });
        });

        $(".quicksearch").on("keyup", function(evt) {

            var search_exp;
            search_exp = $(this).val();

            $(".product-item").each(function(index) {
                var card_title;
                $(this).removeClass("hide-this-item");
                card_title = $(this).find(".card-title").text();

                if (card_title.toLowerCase().indexOf(search_exp.toLowerCase()) >= 0) {
                    return console.log(card_title);

                } else {
                    return $(this).addClass("hide-this-item");
                }

            });

            $grid.isotope({
                itemSelector: ".product-item",
                layoutMode: "fitRows",
                filter: ".product-item:not(.hide-this-item)"
            });


        });



        $('.card-resumen').hide()
        if (window.matchMedia('(min-width: 1200px)').matches) {
            $(document).ready(function() {

                $('.card-resumen').hide()

                $('.hover-info').mouseenter(function() {
                    event.preventDefault()
                    let resumen = $(this).data("hoverid");
                    let selector = '#' + resumen;
                    $(selector).show();
                });

                $('.hover-info').mouseleave(function() {
                    event.preventDefault()
                    let resumen = $(this).data("hoverid");
                    let selector = '#' + resumen;
                    $(selector).hide();
                });

                $('.card-resumen').mouseenter(function() {
                    $(this).show()
                });

                $('.card-resumen').mouseleave(function() {
                    $(this).hide()
                })

            });

        }
    </script>
@endpush
