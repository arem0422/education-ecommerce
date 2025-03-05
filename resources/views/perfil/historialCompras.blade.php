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
    <style>
        .collapsing {
            -webkit-transition: height .01s ease;
            transition: height .01s ease
        }
    </style>
    <div class="container mt-3" style="min-height: 500px;">

        <div class="wrapper rounded">
            <h2>Historial de compras</h2>
            {{-- <div class="table-responsive mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">N° Orden</th>
                            <th scope="col">Mode</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="text-right">Amount</th>
                            <th scope="col" class="text-center">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($registros)
                            @foreach ($registros as $registro)
                                <tr>
                                    <td scope="row"> <span class="fa fa-briefcase mr-1"></span> {{$registro->n_orden}} </td>
                                    <td class="text-muted">12 Jul 2020, 12:30 PM</td>
                                    <td class="text-muted">12 Jul 2020, 12:30 PM</td>
                                    <td class="d-flex justify-content-start align-items-center"> <span class="fa fa-long-arrow-up mr-1"></span> ${{ $registro->pago_data->amount }} </td>
                                    <td class="text-center"><span class="icon-eye clickableModalItemHistorialCompras"></span></td>
                                </tr>
                            @endforeach
                        @endisset

                    </tbody>
                </table>
            </div> --}}
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.6.0/min/tiny-slider.js"></script>
    <script src="https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>
        $('#canonical').attr('href', 'http://sasi.cl/historial-compras');
        $('.tituloSasi').html('historial de compras');
        $(document).ready(function() {
            var registros = <?php echo json_encode($registros) ?>;

            console.log(registros);

            $('.clickableModalItemHistorialCompras').click(function(e){
               e.preventDefault();
               console.log("levantar modal con la data");
            });
        });
    </script>
@endsection
