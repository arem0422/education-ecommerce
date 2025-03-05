@extends('layouts.nav')
@section('content')
    <br>
    <div class="row container-fluid mb-1 m-0 p-0"></div>
@endsection

@push('scriptsOpcionales')
    <script>
        $('#canonical').attr('href', 'http://sasi.cl/carrito');
        sessionStorage.clear();
        let url = '{{ URL::to("FinalizarCompra")}}';
        let plan = 0;
        @if(isset($productos))
            let productos = {!! json_encode($productos) !!};
            let listacarrito = [];
            $.each(productos, (i,producto) => {
                let item = {
                    "id":producto.id,
                    "idlms":producto.id_lms,
                    "nombre":producto.nombre_producto,
                    "precio":producto.precio,
                    "pold":producto.precio_anterior,
                    "imagen": window.location.protocol + "//" + window.location.hostname  + "/storage/" + producto.imagen_producto,
                    "profname":producto.descripcion_profesor
                }

                if(producto.id == 46 || producto.id == 50 || producto.id == 51){

                    switch (producto.id) {
                        case 46:
                            plan = 12;
                            break;
                        case 50:
                            plan = 3;
                            break;
                        case 51:
                            plan = 1;
                            break;
                    }
                    sessionStorage.setItem("Suscripcion", plan);
                }
                listacarrito.push(item)
            });
            sessionStorage.setItem("carrito", JSON.stringify({"productos":listacarrito}));
        @endif
        location.href = url;
    </script>

@endpush
