@extends('layouts.nav')
@push('cssOpcionales')
     {{-- <link rel="stylesheet" href="css/cursos/styleCursos.css">  --}}
    <link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito/producto.css') }}">
@endpush

@section('content')
    <br>
    <div class="row container">
        <div class="col-12" ><h1 class="fs-3 ms-0 ms-lg-5 ps-lg-5">Carrito de compras</h1></div>
    </div>
    <hr class="linea2">
        <div class="row ms-lg-5 ps-lg-5 mx-2 "style="min-height: 50vh">
            <div id="cartDetail" class="col-12 col-lg-7">
            </div>

            <div class="col-12 col-lg-1"></div>
            <div class="col-12 col-lg-4 mb-5">
                <p class="fs-5 m-0 fw-bold">Total: </p>
                <p class="fs-5 m-0 fw-bold mb-3 cartTotal"></p>
                <a href="/FinalizarCompra" class="hvr-pulse bg-primario py-2 px-4 fs-6 text-decoration-none text-center rounded rounded-3 shadow-sm text-light">Finalizar compra</a>
            </div>
        </div>
@endsection
@push('scriptsOpcionales')
    <script>
        $('#canonical').attr('href', 'http://sasi.cl/carrito');
        $('.tituloSasi').html('Carrito de compra');
        $( document ).ready(function() {
            $("#cartDetail").empty();
            $(".cartTotal").empty();
            let productos = sessionStorage.getItem("carrito");
            var storageCar = $("#cartDetail");
            var carTotal = 0;
            let pendienteBorrado = false;
            var listacarrito = [];
            $(".cartTotal").text(carTotal);

            if(productos){
                var listacarrito = JSON.parse(productos);
                var count = Object.keys(listacarrito.productos).length;
               if(count > 0){
                var Cesta = listacarrito.productos;
                $.each( Cesta, function( key, value ) {

                    //console.log(value);

                    var imgurl = value.imagen;
                    var unitPrice = value.precio.replace("$ ","");
                    var cleanunitPrice = unitPrice.replace(".","");
                    let precioanterior = unitPrice + (unitPrice * 0.3);
                    var oldprice =  formatearCifra(precioanterior);
                    carTotal = carTotal+parseInt(cleanunitPrice);
                    var htmlProductoStorage = '<div class="row bg-white rounded rounded-3 shadow producto-carro position-relative my-5 my-md-2 curso-'+key+'"><div class="col-5 p-0 m-0 producto-carro rounded-start bg-dark" style="background-image: url('+imgurl+');"></div><div class="col-7 col-md-4 ps-3 pt-3"><a class="text-decoration-none" href="" title=""><p class="fs-6 lh-1 fw-bold text-dark mb-2">'+value.nombre+'</p></a><p class="fs-6 m-0 fw-bold texto-productos">Profesor</p><p class="fs-6 m-0 texto-productos text-capitalize">' +value.profname+ '</p><p class="d-inline-block fs-6 text-danger m-0 fw-bold texto-productos">precio anterior</p><p class="d-inline-block fs-6 text-danger text-decoration-line-through mb-1 mb-lg-3 fw-bold my-1">  $ '+oldprice+' </p><p class="fs-6 fs-md-5 fw-bold">'+value.precio+'</p></div><div class="col-12 col-md-3 pe-3 pt-1 pt-lg-3 text-end lh-1"><a href="#" class=""><p class="fs-6 d-inline-block text-secondary text-decoration-underline m-0 texto-productos d-none"> Guardar para después </p></a></div><a href="#" class=" ms-2 hvr-pulse position-absolute bottom-0 end-0 w-25 w-sm-25 bg-primario py-2 px-2 fs-6 texto-productos text-light text-decoration-none text-center m-3 rounded rounded-3 shadow-sm btnunibuy d-none">Comprar solo este curso</a></div>';
                    storageCar.append(htmlProductoStorage);
                });
               }
               var finalAmount = new Intl.NumberFormat('de-DE').format(carTotal);
               $(".cartTotal").text("$ "+finalAmount);
            }

            function calculateTotalCart(){
                carTotal = 0;
                listacarrito["productos"].map((p,i)=>{
                    let unitPrice = p.precio.replace("$ ","");
                    let cleanunitPrice = unitPrice.replace(".","");
                    carTotal = carTotal+parseInt(cleanunitPrice);
                });
                let finalAmount = new Intl.NumberFormat('de-DE').format(carTotal);
                $(".cartTotal").text("$ "+finalAmount);
            }

            function formatearCifra(cifra) {
                // Eliminamos cualquier carácter que no sea un dígito o un punto
                cifra = cifra.replace(/[^\d.]/g, '');

                // Buscamos la primera aparición del punto decimal
                var indicePunto = cifra.indexOf('.');

                if (indicePunto !== -1) {
                    // Si hay un punto decimal, eliminamos los dígitos adicionales después de los tres primeros
                    cifra = cifra.slice(0, indicePunto + 4);
                }

                return cifra;
            }


        });

    </script>
@endpush
