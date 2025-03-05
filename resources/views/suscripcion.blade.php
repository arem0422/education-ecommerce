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
<link rel="stylesheet" href="{{ asset('css/suscripcion.css') }}">


<section style="height: 80vh" class="mx-4 my-5 border-rounded bg-gris section-mail-suscripcion position-relative">
    <style>
        body{
            background-color: #1E1E1D !important
        }
        .section-mail-suscripcion {
            background-image: url('{{ asset('img/tablet_sasi.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>
    <div style="height: 80vh" class="border-rounded position-absolute container-mail-suscripcion">
        <div class="row d-flex justify-content-center py-5">
            <h1 class="pt-5 text-white fs-2 fw-bold text-center col-12 col-lg-6">Educación + entretención
                <br>
                100% online
            </h1>
            <p class="pt-2 text-white fs-3 text-center col-12 col-lg-8">Haz de tu tiempo en pantalla un tiempo de calidad.</p>
            <p class="pt-2 text-white fs-5 fs-movil-suscripcion text-center px-5 col-12 col-lg-9">En Sasi encontrarás más de 50 cursos en diversas áreas: vida sana, crecimiento profesional y estilo de vida con los que podrás crecer y entretenerte. </p>
            <p class="pt-4 text-white fs-5 fs-movil-suscripcion text-center px-5 col-12 col-lg-10 mb-4">¿Quieres ser parte de Sasi ya? Agrega la suscripción al carro y comienza a vivir la
                experiencia Sasi</p>
            <div class="col-10 col-lg-5 m-0 p-0 text-center">
                <button class="registerbanner hvr-pulse shadow mt-5 fs-4 fs-movil-suscripcion fw-bold px-5 py-3 rounded-pill lh-1 btn btn-primary mx-auto text-gris presetSuscription" type="button" data-stime="12">
                    <div class=" btnComprar" data-idlms="{{ $producto12->id_lms }}" data-id="{{ $producto12->id }}" data-img="{{ url('storage/'.$producto12->imagen_producto) }}"  data-pname="{{ $producto12->nombre_producto }}"  data-panterior="{{ $producto12->precio_anterior }}" data-price="{{ $producto12->precio }}">Quiero Sasi por 1 año</div>
                </button>
            </div>
            {{-- <div class="col-5 m-0 p-0">
                <input class="bg-transparent text-white mail-suscripcion w-100 ps-3" type="text" placeholder="Mail">
            </div>
            <a class="col-2 boton-mail-suscripcion text-decoration-none text-dark fs-4 fw-bold px-3 m-0 text-center align-middle pt-2" href="">Comenzar</a> --}}
        </div>
    </div>
</section>


<h1 class="text-center my-5 text-white fs-1 fw-bold mx-4 mx-lg-0 position-relative">
    <div class="bg-transparent position-absolute" style="height: 69px !important; top:-75px" id='sasi-suscripcion'></div>
    Beneficios de suscribirte en Sasi</h1>


<section class="mx-4 mx-lg-6 my-4 border-rounded bg-black">
    <div class="row d-flex justify-content-start py-5">
        <div class="col-12 col-md-7 mt-3">
            <ul class="ms-2 ms-md-5 text-white p-0">
                <li class="dotless fs-5 my-3 fs-movil-suscripcion ms-xl-5"><span class="text-primario icon-check">   </span>Acceso ilimitado a todos los cursos de Sasi</li>
                <li class="dotless fs-5 my-3 fs-movil-suscripcion ms-xl-5"><span class="text-primario icon-check">   </span>Nuevos cursos todos los meses</li>
                <li class="dotless fs-5 my-3 fs-movil-suscripcion ms-xl-5"><span class="text-primario icon-check">   </span>Cursos desarrollados para potenciar
                    tu calidad de vida (Profesional y estilo de Vida)</li>
                <li class="dotless fs-5 my-3 fs-movil-suscripcion ms-xl-5"><span class="text-primario icon-check">   </span>Atención personalizada de nuestros
                    centros de ayuda</li>
                <li class="dotless fs-5 my-3 fs-movil-suscripcion ms-xl-5"><span class="text-primario icon-check">   </span>Obtén tu Certificado digital</li>
                <li class="dotless fs-5 my-3 fs-movil-suscripcion ms-xl-5"><span class="text-primario icon-check">   </span>Contacto personalizado con los tutores de cada curso</li>
                <li class="dotless fs-5 my-3 fs-movil-suscripcion ms-xl-5"><span class="text-primario icon-check">   </span>Beneficios exclusivos para suscriptores</li>
            </ul>
        </div>
        <div class="col-12 col-md-5 mt-3">
            <h1 class=" mb-3 text-white ms-3 ms-md-5 fs-3 fw-bold">PLANES</h1>
            <ul class="ms-4 p-0 text-white">
                <li class="dotless fs-5 my-4">
                    <div class="row">
                        <div class="col-12 col-xl-7 m-0 p-0 pe-4 py-3">
                            <div class="row m-0 p-0 boton-suscripcion">
                                <div class="col-6 fs-5 text-center py-2 borde-derecho izquierda-rounded text-primario fw-bold">{{ $producto1->precio }}</div>
                                <div class="col-6 fs-5 text-center fst-italic py-2 px-1 fw-bold text-primario">1 mes</div>
                                <div class="col-12 fs-5 text-center text-uppercase py-2 borde-arriba fw-bold bg-primario borde-abajo"><div class="m-0 p-0 hvr-pulse"><a class="text-gris text-decoration-none presetSuscription btnComprar" data-idlms="{{ $producto1->id_lms }}" data-id="{{ $producto1->id }}" data-img="{{ url('storage/'.$producto1->imagen_producto) }}" data-price="{{ $producto1->precio }}" data-pname="{{ $producto1->nombre_producto }}" data-panterior="{{ $producto1->precio_anterior }}" data-stime="1" href="#">suscribirme</a></div></div>
                            </div>

                        </div>
                        <div class="col-12 col-xl-7 m-0 p-0 pe-4 pt-3">
                            <div class="row m-0 p-0 boton-suscripcion">
                                <div class="col-6 fs-5 text-center py-2 borde-derecho izquierda-rounded text-primario fw-bold">{{ $producto3->precio }}</div>
                                <div class="col-6 fs-5 text-center fst-italic py-2 px-1 fw-bold text-primario">3 meses</div>
                                <div class="col-12 fs-5 text-center text-uppercase py-2 borde-arriba fw-bold bg-primario borde-abajo"><div class="m-0 p-0 hvr-pulse"><a class="text-gris text-decoration-none presetSuscription btnComprar" data-idlms="{{ $producto3->id_lms }}" data-id="{{ $producto3->id }}" data-img="{{ url('storage/'.$producto3->imagen_producto) }}" data-price="{{ $producto3->precio }}" data-pname="{{ $producto3->nombre_producto }}" data-panterior="{{ $producto3->precio_anterior }}" data-stime="3" href="#">suscribirme</a></div></div>
                            </div>
                            <div class="fs-5 text-start fst-italic text-primario">*$7.995 mensual</div>
                        </div>
                        <div class="col-12 col-xl-7 m-0 p-0 pe-4 pt-3">
                            <div class="row m-0 p-0 boton-suscripcion">
                                <div class="col-6 fs-5 text-center py-2 borde-derecho izquierda-rounded text-primario fw-bold">{{ $producto12->precio }}</div>
                                <div class="col-6 fs-5 text-center fst-italic py-2 px-1 fw-bold text-primario">1 año</div>
                                <div class="col-12 fs-5 text-center text-uppercase py-2 borde-arriba fw-bold bg-primario borde-abajo"><div class="m-0 p-0 hvr-pulse"><a class="text-gris text-decoration-none presetSuscription btnComprar" data-idlms="{{ $producto12->id_lms }}" data-id="{{ $producto12->id }}" data-img="{{ url('storage/'.$producto12->imagen_producto) }}" data-price="{{ $producto12->precio }}" data-pname="{{ $producto12->nombre_producto }}" data-panterior="{{ $producto12->precio_anterior }}" data-stime="12" href="#">suscribirme</a></div></div>
                            </div>
                            <div class="fs-5 text-start fst-italic text-primario">*$3.990 mensual</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="mx-4 mx-lg-6 my-5 border-rounded bg-fondo-izquierdo img-suscripcion">
    <style>
        .bg-fondo-izquierdo {
            background-image: url('{{ asset('img/fondo_amarillo_izquierda.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

    <div class="row d-flex justify-content-start py-5 py-md-3">
        <div class="col-12 col-md-7 col-xl-6 px-5">
            <h1 class="text-start text-white fs-2 fw-bold text-shadow fs-movil-suscripcion">Curso desde cocina,
                lengua de señas
                hasta Power BI
            </h1>
            <p class="text-start text-white fs-5 text-shadow fs-movil">
                Disfruta de nuestros cursos en diversas áreas: Oficios, hobbies, habilidades blandas, uso de programas y mucho más
            </p>
        </div>
        <div class="col-12 col-md-5 col-xl-6 px-5 position-relative">
          <img src="{{ asset('img/suscripcion-1.png') }}" alt="Mujer con celular" class="position-absolute img-suscripcion-1">
        </div>
    </div>
</section>

<section class="mx-4 mx-lg-6 my-5 border-rounded bg-fondo-derecho img-suscripcion">
    <style>
        .bg-fondo-derecho {
            background-image: url('{{ asset('img/fondo_amarillo_derecho.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

    <div class="row d-flex justify-content-start py-5 py-md-3">
        <div class="col-12 col-md-5 col-xl-6 px-5 position-relative">
            <img src="{{ asset('img/suscripcion-2.png') }}" alt="Mujer sentada con notebook" class="position-absolute img-suscripcion-2">
        </div>
        <div class="col-12 col-md-7 col-xl-6 px-5">
            <h1 class="text-start text-white fs-2 fw-bold text-shadow fs-movil-suscripcion">Descarga tus cursos
                para verlos offline
            </h1>
            <p class="text-start text-white fs-5 text-shadow fs-movil">
                Guarda tu contenido favorito y tendrás siempre algo para aprender sin necesidad de usar internet.
            </p>
        </div>

    </div>
</section>

<section class="mx-4 mx-lg-6 my-5 border-rounded bg-fondo-izquierdo img-suscripcion">
    <style>
        .bg-fondo-izquierdo {
            background-image: url('{{ asset('img/fondo_amarillo_izquierda.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

    <div class="row d-flex justify-content-start py-5 py-md-3">
        <div class="col-12 col-md-7 col-xl-6 px-5">
            <h1 class="text-start text-white fs-2 fw-bold text-shadow fs-movil-suscripcion">Disfruta de tus cursos
                desde cualquier
                dispositivo
            </h1>
            <p class="text-start text-white fs-5 text-shadow fs-movil">
                Computador, celular, o tablet, puedes ver tus cursos desde donde más te acomode
            </p>
        </div>
        <div class="col-12 col-md-5 col-xl-6 px-5 position-relative">
          <img src="{{ asset('img/suscripcion-3.png') }}" alt="Pareja con celulares" class="position-absolute img-suscripcion-3">
        </div>
    </div>
</section>

<section class="mx-4 mx-lg-6 my-5 border-rounded bg-fondo-izquierdo img-suscripcion">
    <style>
        .bg-fondo-izquierdo {
            background-image: url('{{ asset('img/fondo_amarillo_derecho.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

    <div class="row d-flex justify-content-start py-5 py-md-3">
        <div class="col-12 col-md-5 col-xl-6 px-5 position-relative">
            <img src="{{ asset('img/suscripcion-4.png') }}" alt="Grupo de personas felicitando" class="position-absolute img-suscripcion-4">
        </div>
        <div class="col-12 col-md-7 col-xl-6 px-5">
            <h1 class="text-start text-white fs-2 fw-bold text-shadow fs-movil-suscripcion">Únete a la comunidad SASI
            </h1>
            <p class="text-start text-white fs-5 text-shadow fs-movil">
                Ya son más de 150.000 los alumnos que han decidido aprender y entretenerse en el mismo lugar
            </p>
        </div>

    </div>
</section>
<div class="row d-flex justify-content-center mb-5">
    <div class="col-12 text-center">
        <button class="registerbanner hvr-pulse shadow mt-2 fs-4 fs-movil-suscripcion fw-bold px-5 py-3 rounded-pill lh-1 btn btn-primary mx-auto text-gris" type="button" onclick="location.href='#sasi-suscripcion'">Súscribirme a Sasi ahora</button>
    </div>
</div>



@endsection
@push('scriptsOpcionales')

<script>
    $('#canonical').attr('href', 'https://sasi.cl/suscripcion');
    $('.tituloSasi').html('Sasi suscripción');
    // $('.btnSuscription_silver').click(function(e){
    //     e.preventDefault();
    //     swal({
    //       title: "Pronto te podrás suscribir!",
    //       type: "success",
    //       icon: 'info',
    //       timer: 4000
    //     });
    //     return;
    //     let items = sessionStorage.getItem("carrito");
    //     var listacarrito = JSON.parse(items);
    //     var cartOpen = $('#offcanvasScrolling').hasClass('show');
    //     if(items != null){
    //         //just add
    //         let productjson = {
    //             "productos":[
    //                 {"id":"5","idlms":"suscription_silver","nombre":"Suscripcion SASI", "precio":"5990","imagen":"https://static.vgroup.cl/2022/06/SASI%20NEW/Logo%20sasi%20blanco.png"}
    //             ]
    //         }
    //         sessionStorage.setItem("carrito", JSON.stringify(productjson));

    //         let suscription_silver = "suscription_silver";
    //         let nombre = "Suscripcion SASI";
    //         let idlms = "suscription_silver";
    //         let pimg = "https://static.vgroup.cl/2022/06/SASI%20NEW/Logo%20sasi%20blanco.png";
    //         let pname = "Suscripcion SASI";
    //         let pprice = 5990;

    //         // //procedemos a agregar el producto en la modal como html
    //         let cartList = $(".productList");
    //         let htmlProducto = '<div class="col-3 col-lg-2 cursomodal'+suscription_silver+'"><img class="img-pedido w-100 rounded rounded-3 cursomodal'+idlms+'" src="'+pimg+'"></div><div class="col-6 col-lg-7 cursomodal'+idlms+'"><p class="fs-6">'+pname+'</p></div><div class="col-3 cursomodal'+idlms+'"><p class="text-end fs-6">'+pprice+'</p></div>';
    //         cartList.append(htmlProducto);
    //         cartTotal();
    //         if(cartOpen){//modal abierta solo queda agregar el producto

    //         }else{//modal cerrada, se abre la modal y se agrega el producto
    //             $("#btnCar").click();
    //         }
    //     }else{
    //         //first add
    //         let productjson = {
    //             "productos":[
    //                 {"id":"5","idlms":"suscription_silver","nombre":"Suscripcion SASI", "precio":"5990","imagen":"https://static.vgroup.cl/2022/06/SASI%20NEW/Logo%20sasi%20blanco.png"}
    //             ]
    //         }
    //         sessionStorage.setItem("carrito", JSON.stringify(productjson));

    //         let suscription_silver = "suscription_silver";
    //         let nombre = "Suscripcion SASI";
    //         let idlms = "suscription_silver";
    //         let pimg = "https://static.vgroup.cl/2022/06/SASI%20NEW/Logo%20sasi%20blanco.png";
    //         let pname = "Suscripcion SASI";
    //         let pprice = 5990;

    //         console.log(productjson);

    //         // //procedemos a agregar el producto en la modal como html
    //         let cartList = $(".productList");
    //         let htmlProducto = '<div class="col-3 col-lg-2 cursomodal'+suscription_silver+'"><img class="img-pedido w-100 rounded rounded-3 cursomodal'+idlms+'" src="'+pimg+'"></div><div class="col-6 col-lg-7 cursomodal'+idlms+'"><p class="fs-6">'+pname+'</p></div><div class="col-3 cursomodal'+idlms+'"><p class="text-end fs-6">'+pprice+'</p></div>';
    //         cartList.append(htmlProducto);
    //         cartTotal();
    //         if(cartOpen){//modal abierta solo queda agregar el producto

    //         }else{//modal cerrada, se abre la modal y se agrega el producto
    //             $("#btnCar").click();
    //         }
    //     }
    //     // console.log(listacarrito);
    //     // sessionStorage.setItem("carrito", JSON.stringify(listacarrito));
    //     // cartQtty(true);
    //     // //procedemos a agregar el producto en la modal como html
    //     // let cartList = $(".productList");
    //     // let htmlProducto = '<div class="col-3 col-lg-2 cursomodal'+idlms+'"><img class="img-pedido w-100 rounded rounded-3 cursomodal'+idlms+'" src="'+pimg+'"></div><div class="col-6 col-lg-7 cursomodal'+idlms+'"><p class="fs-6">'+pname+'</p></div><div class="col-3 cursomodal'+idlms+'"><p class="text-end fs-6">'+pprice+'</p></div>';
    //     // cartList.append(htmlProducto);
    //     // cartTotal();
    // });

    $(".presetSuscription").click(function(event){
            let plan = $(this).data("stime");
            sessionStorage.setItem("Suscripcion", plan);
            event.preventDefault();
    });
</script>

@endpush
