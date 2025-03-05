$(document).ready(function(){
    const standalone = window.navigator.standalone;
    const userAgent = window.navigator.userAgent.toLowerCase();
    const ios = /iphone|ipod|ipad/.test(userAgent);
    if (ios){
        $('#fechaNacimiento').prop( "onfocus", null );
        $('#fechaNacimiento').prop( "onblur", null );
        $('#fechaNacimiento').attr("type","date");
    }

    //rut
    $('#rut').rut({
        onSuccess: function(){
            $('#rut').css('color', '#000');
        },
        onError: function(){
            $('#rut').css('color', '#f06964');


            setTimeout(function() {
              document.getElementById('rut').focus();
          }, 0);
        }
    });

    $('#canonical').attr('href', 'http://sasi.cl/FinalizarCompra');
    $('.tituloSasi').html('Finalizar compra');
    // TagManager begin_checkout
    begin_checkout();
    //booleano para manejar el loading del boton para finalizar la compra que ademas tiene un funcionamiento que impide
    //clickear muchas veces hasta que responda el server
    var loadingFinalizarCompra = false;

    //obtenemos en una variable el tipo de suscrición a comprar
    //let tiposuscripcion = sessionStorage.getItem("Suscripcion");
    const validado = sessionStorage.getItem("ValidaciónCLA");
    if(validado){
        //$("#btnFnCmp").removeClass('d-none');
        $("#btnFnCmp").addClass('d-none');
        //sessionStorage.setItem("validadoCla", "Si es");
    }else{
        $("#btnValidarCla").removeClass('d-none')
        //console.log(`tiene valor: ${validado}`);
    }

    //aca se definen variables de js que se utilizaran al empezar el DOM
    let storageCar = $("#carDetail");
    let carTotal = 0;
    let productos = sessionStorage.getItem("carrito");
    let ProductsId = "";
    storageCar.empty();
    $(".cartTotal").empty();
    $(".cartTotal").text(carTotal);
    //se valida si hay productos
    if(JSON.parse(productos).productos.length > 0){
        var listacarrito = JSON.parse(productos);
        var count = Object.keys(listacarrito.productos).length;
        if(count > 0){
            var Cesta = listacarrito.productos;
            $.each( Cesta, function( key, value ) {
                if(ProductsId != ""){
                    ProductsId = ProductsId+","+value.id;
                }else{
                    ProductsId = value.id;
                }
                var imagen = value.imagen;
                var imgurl = imagen.replace(/\\/g, "/");
                var unitPrice = value.precio.replace("$ ","");
                var cleanunitPrice = unitPrice.replace(".","");
                carTotal = carTotal+parseInt(cleanunitPrice);
                let htmlProductoStorage = '<div class="row d-flex align-items-start my-2 cursomodal'+value.idlms+'"><div class="col-3 col-sm-2 col-lg-3"><img class="img-pedido w-100 rounded rounded-3" src="'+imgurl+'" alt="'+value.nombre+'"></div><div class="col-6 col-sm-7 col-lg-6"><p class="fs-6 fw-bold">'+value.nombre+'</p></div><div class="col-3"><p class="text-end fs-6 fw-bold">'+value.precio+' &nbsp;&nbsp;<span class="icon-trash deleteProductoFromFinalizarCompra" data-idcursoeliminar='+value.idlms+' data-idcursoeliminarproducto='+value.id+' style="cursor:pointer;color:red;"></span></p></div></div>';
                storageCar.append(htmlProductoStorage);
            });
        }else{

        }
       var finalAmount = new Intl.NumberFormat('de-DE').format(carTotal);
       $(".cartTotal").text("$ "+finalAmount);
       $("#productsList").val(ProductsId);
    }else{
        //renderizar un boton que diga no tienes nada en el carro xd
        storageCar.append('<div class="d-flex col-8 justify-content-center" id="agregarProductosCarrito" style="margin:0 auto !important;" align="center"><button type="button" class="btn bg-primario w-100 hvr-pulse rounded rounded-3 shadow-sm"><span>Agregar Productos</span> <span class="icon-shopping-cart"></span>');
    }

    //codigo para redirigir al usuario a que agregue productos
    $('#agregarProductosCarrito').click(function(e){
      e.preventDefault();
      window.location.href = "/cursos";
    });
    //eliminar productos del carro
    $('.deleteProductoFromFinalizarCompra').click(function(event){
        event.preventDefault();
        //aplicar descuento si tiene
        let idCursoLms = $(this).data("idcursoeliminar");
        let idProducto = $(this).data("idcursoeliminarproducto");

        if(idCursoLms != undefined){
            if(idProducto == 46 || idProducto == 50 || idProducto == 51){
                $(".paykuCompra").addClass("d-none");
                sessionStorage.setItem("Suscripcion", "");
            }
            //se recorre el array
            listacarrito["productos"].map((p,i)=>{
              if(p.idlms == idCursoLms){
                //acá elimina del carrito y actualiza el cartQtty
                listacarrito["productos"].splice(i,1);
                $('.curso'+idCursoLms).attr("style", "display: none !important");
                $('.cursomodal'+idCursoLms).attr("style", "display: none !important");
              }
            });
            //acá crear la peticion ajax con el json stringify del carrito
            //se elimina de la session
            //deberia eliminarlo tambien del input con los id producto
            sessionStorage.setItem("carrito", JSON.stringify(listacarrito));
            //crear una funcion para recalcular el cartTotal
            cartTotal();
            //acá se trae el cart del lado
            cartQtty(true);
            //ahora actualizar el input para que tenga actualizado el listado de cursos

            let productosDeleteCarrito = sessionStorage.getItem("carrito");

            let ProductsIdDelete = "";
            if(productosDeleteCarrito){
                // $("#productsList").val('');
                var listacarritoDelete = JSON.parse(productosDeleteCarrito);
                var count = Object.keys(listacarritoDelete.productos).length;
                if(count > 0){
                    var Cesta = listacarritoDelete.productos;
                    $.each( Cesta, function( key, value ) {
                        if(ProductsIdDelete != ""){
                            ProductsIdDelete = ProductsIdDelete+","+value.id;
                        }else{
                            ProductsIdDelete = value.id;
                        }
                    });
                }
                $("#productsList").val(ProductsIdDelete);
            }
            //aplicar descuento si tiene
            //$(".aplicarCupon").click();
        }else{
            console.log("error");
        }
    });
    //acá se validan los inputs que tienen el valor de campo requerido que se llenan
    $('input[name=lastname_buy]').change(function(){
       var inputString = $('input[name=lastname_buy]').val();
       if(inputString != ""){
           if( !($('#lastname_buy_error').css("display") == "none")){
             $('#lastname_buy_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#lastname_buy_error').show();
       }
    });
    $('input[name=name_buy]').change(function(){
       var inputString = $('input[name=name_buy]').val();
       if(inputString != ""){
           if( !($('#name_buy_error').css("display") == "none")){
             $('#name_buy_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#name_buy_error').show();
       }
    });
    $('input[name=mail_buy]').change(function(){
       var inputString = $('input[name=mail_buy]').val();
       if(inputString != ""){
           if( !($('#mail_buy_error').css("display") == "none")){
             $('#mail_buy_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#mail_buy_error').show();
       }
    });
    $('input[name=billing_address]').change(function(){
       var inputString = $('input[name=billing_address]').val();
       if(inputString != ""){
           if( !($('#billing_address_error').css("display") == "none")){
             $('#billing_address_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#billing_address_error').show();
       }
    });
    $('input[name=billing_mail]').change(function(){
       var inputString = $('input[name=billing_mail]').val();
       if(inputString != ""){
           if( !($('#billing_mail_error').css("display") == "none")){
             $('#billing_mail_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#billing_mail_error').show();
       }
    });
    $('input[name=billing_name]').change(function(){
       var inputString = $('input[name=billing_name]').val();
       if(inputString != ""){
           if( !($('#billing_name_error').css("display") == "none")){
             $('#billing_name_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#billing_name_error').show();
       }
    });
    $('input[name=billing_turn]').change(function(){
       var inputString = $('input[name=billing_turn]').val();
       if(inputString != ""){
           if( !($('#billing_turn_error').css("display") == "none")){
             $('#billing_turn_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#billing_turn_error').show();
       }
    });
    $('input[name=billing_rut]').change(function(){
       var inputString = $('input[name=billing_rut]').val();
       if(inputString != ""){
           if( !($('#billing_rut_error').css("display") == "none")){
             $('#billing_rut_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#billing_rut_error').show();
       }
    });
    $('input[name=gift_lastname]').change(function(){
       var inputString = $('input[name=gift_lastname]').val();
       if(inputString != ""){
           if( !($('#gift_lastname_error').css("display") == "none")){
             $('#gift_lastname_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#gift_lastname_error').show();
       }
    });
    $('input[name=gift_mail]').change(function(){
       var inputString = $('input[name=gift_mail]').val();
       if(inputString != ""){
           if( !($('#gift_mail_error').css("display") == "none")){
             $('#gift_mail_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#gift_mail_error').show();
       }
    });
    $('input[name=gift_name]').change(function(){
       var inputString = $('input[name=gift_name]').val();
       if(inputString != ""){
           if( !($('#gift_name_error').css("display") == "none")){
             $('#gift_name_error').hide();
           }
       }else{
        //como es un campo requerido mostramos el error
        $('#gift_name_error').show();
       }
    });
    //funcion que sirve para ocultar los posibles campos de errores
    function ocultarCamposError(){
        $('#lastname_buy_error').hide();
        $('#mail_buy_error').hide();
        $('#mail_buy_confirmation_error').hide();
        $('#name_buy_error').hide();
        $('#billing_address_error').hide();
        $('#billing_mail_error').hide();
        $('#billing_name_error').hide();
        $('#billing_rut_error').hide();
        $('#billing_turn_error').hide();
        $('#gift_lastname_error').hide();
        $('#gift_mail_error').hide();
        $('#gift_mail_confirmation_error').hide();
        $('#gift_name_error').hide();
    }
    //aca se submitea el form para iniciar la compra
    $(".initBuy").click(function(e){
        //TODO validar que los correos sean identicos, correos de comprobación y el manejo de errores de estos mismos
        e.preventDefault();
        //acá trabajar un loading para presionar el boton
        if(loadingFinalizarCompra){
            return;
        }
        ocultarCamposError();
        loadingFinalizarCompra = true;
        $('#showFinalizarCompraDiv').hide();
        $('#showLoadingProcesandoCompraDiv').show();

        //traer el carrito del localStorage
        let productosStorage = sessionStorage.getItem("carrito");
        //se submitean los datos del formulario
        var fd = new FormData();
        var form_list = $("#buy_form").serializeArray();

        //
        // Obtenemos el valor de 'validacionCla' desde el localStorage
        const valorValidacionCla = localStorage.getItem('validacionCla');

        // Definimos una variable 'cla' y verificamos si existe el valor en el localStorage
        // Si existe, se le asigna el valor 1, de lo contrario, se le asigna otro valor por defecto (por ejemplo, 0).
        let cla;

        if (valorValidacionCla !== null) {
            cla = 1;
        } else {
        // Asignar un valor predeterminado si 'validacionCla' no existe en el localStorage
            cla = 0; // Puedes cambiar este valor por el que desees si el valor por defecto es diferente.
        }

        //pushear el carrito para validarlo contra el back
        form_list.push({name: 'carrito', value: sessionStorage.getItem("carrito")});
        form_list.push({name: 'escla', value: cla});
        //recorrer y hacer append al form
        jQuery.each( form_list, function(i, field){
            fd.append(field.name,field.value);
        });
        $.ajax({
            type: "POST",
            url: "/StarBuy",
            data: form_list,
            success:function (data){
                loadingFinalizarCompra = false;
                $('#showFinalizarCompraDiv').show();
                $('#showLoadingProcesandoCompraDiv').hide();
                //validacion de errores y mostrar en pantalla el error bajo el input
                //esta validacion de errores aplicará para todos los campos opcionales como factura y tambien regalo
                if(!data.ok && data.errores){
                    //validaciones basicas de formulario
                    if(data.errores['productsList'] || data.errores['carrito']){
                        swal({
                            title: "Carrito Vacío!",
                            text: "Debes agregar productos al carrito.",
                            type: "error",
                            icon: 'error',
                            timer: 2000
                        });
                    }
                    if(data.errores['cursos_registrados']){
                        //ESTO SOLO SE MUESTRA SI EL USUARIO OBJETIVO DE LOS CURSOS YA LOS TIENE REGISTRADOS
                        //recorrer el array para mostrarle al usuario los cursos que debe eliminar de su carrito xd
                        var txt3 = document.createElement(`div`);
                        data.errores['cursos_registrados'].map((curso,i)=>{
                            let index = i+1;
                            txt3.innerHTML = txt3.innerHTML + "<span><strong>"+index+"</strong> "+curso.tituloCurso.toString()+"</span><br>";
                        });
                        swal({
                            title: !data.errores['gift'] ? 'Ya tienes estos cursos, elimínalos de tu carrito!' : 'A quien le envías el regalo ya tiene el curso, elimínalo de tu carrito!',
                            content: txt3,
                            type: "error",
                            icon: 'error',
                            timer: 5000
                        });
                    }
                    if(data.errores['lastname_buy']){
                        $('#lastname_buy_error').html(data.errores['lastname_buy'][0]);
                        $('#lastname_buy_error').show();
                    }
                    if(data.errores['mail_buy']){
                        $('#mail_buy_error').html(data.errores['mail_buy'][0]);
                        $('#mail_buy_error').show();
                    }
                    if(data.errores['cel_buy']){
                        $('#cel_buy_error').html(data.errores['cel_buy'][0]);
                        $('#cel_buy_error').show();
                    }
                    if(data.errores['name_buy']){
                        $('#name_buy_error').html(data.errores['name_buy'][0]);
                        $('#name_buy_error').show();
                    }
                    if(data.errores['document_buy']){
                        $('#document_buy_error').html(data.errores['document_buy'][0]);
                        $('#document_buy_error').show();
                    }
                    if(data.errores['unknown_error']){
                        swal({
                            title: "Error",
                            text: data.errores['unknown_error'],
                            type: "error",
                            icon: 'error',
                            timer: 3000
                        });
                    }
                }else{
                    //si no hay errores de validacion de inputs entonces validar el carrito
                    //primero validar el carrito
                    if(!data.ok && data.idsNoDisponible != undefined && data.idsNoDisponible.length > 0){
                        //validar el carrito error
                        if(data.idsNoDisponible.length > 0 && JSON.parse(productosStorage).productos.length != JSON.parse(data.xjs).productos){
                            //acá actualizar la session en el localStorage
                            sessionStorage.setItem("carrito", JSON.stringify(JSON.parse(data.xjs)));
                            //ahora actualizar el listado lateral del carrito y además si esta en la pestaña de /carrito se eliminan ahi tambien
                            data.idsNoDisponible.map((id)=>{
                            //$(".curso"+id).hide();
                            //$(".cursomodal"+id).hide();
                            //agregar el display none important en caso de que haya un flex important
                            $('.curso'+id).attr("style", "display: none !important");
                            $('.cursomodal'+id).attr("style", "display: none !important");
                            });
                            //acá actualizar el carrito de arriba la cantidad
                            cartQtty(false);
                            //llamar a calculate cart para actualizar el total
                            cartTotal();
                            //mostrar alerta de error
                            swal({
                                title: "Manipulación del carrito!",
                                text: "Se ha detectado una manipulación del carrito y se ha eliminado dicho producto, intenta agregarlo nuevamente.",
                                type: "error",
                                icon: 'error',
                                timer: 5000
                            });
                            return;
                        }
                    }else{
                        if(data.response != "compra 0"){
                            //si no hay errores entonces continuar
                            var urlTienda =  data.response.url+'?token_ws='+data.response.token;
                            window.location.replace(urlTienda);
                        }else{
                            if(data.registrocompra == 200 || data.registrocompra == 300){
                                window.location.replace("/exitocero/"+data.norden);
                            }else{
                                window.location.replace("/rechazocero");
                            }
                            console.log(data.registrocompra);
                        }

                        //si no hay errores entonces continuar
                        //var urlTienda =  data.response.url+'?token_ws='+data.response.token;
                        //window.location.replace(urlTienda);
                    }
                }
            },
            error:function(jqXhr, textStatus, errorMessage){
                loadingFinalizarCompra = false;
                $('#showFinalizarCompraDiv').show();
                $('#showLoadingProcesandoCompraDiv').hide();
                swal({
                    title: "Error!",
                    text: "Ocurrió un error intenta más tarde.",
                    type: "error",
                    icon: 'error',
                    timer: 2000
                });
                // console.log("handle error");
                // console.log('Error' + errorMessage);
            }
        });
    });


    //validar el email
    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    //calcular el total del carrito
    function cartTotal(){
        let productos = sessionStorage.getItem("carrito");
        let carTotal = 0;
        var listacarrito = JSON.parse(productos);
        let Cesta = listacarrito.productos;
        $.each( Cesta, function( key, value ) {
            let unitPrice = value.precio.replace("$ ","");
            let cleanunitPrice = unitPrice.replace(".","");
            carTotal = carTotal+parseInt(cleanunitPrice);
        });
        let finalAmount = new Intl.NumberFormat('de-DE').format(carTotal);
        $(".cartTotal").text("$ "+finalAmount.split(',')[0]);

    };

    $(".finalvalidation").click(function(e){
        e.preventDefault();
        $("#Modal-caja").modal('toggle')
    });

})




