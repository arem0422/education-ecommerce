const autoCompleteJS = new autoComplete({
    data: {
        src: async () => {
            try {
                // Loading placeholder text
                document
                    .getElementById("autoComplete")
                    .setAttribute("placeholder", "Buscar...");
                // Fetch External Data Source

                const jsonProductos = await fetch(
                    "{{ url()->to('get-products-list') }}"
                );

                const data = jsonProductos.json();

                // Post Loading placeholder text
                document
                    .getElementById("autoComplete")
                    .setAttribute("placeholder", autoCompleteJS.placeHolder);
                // Returns Fetched data
                return data;
            } catch (error) {
                return error;
            }
        },


        //Filtro por solo nombre del producto.
        keys: ["nombre_producto"],
        cache: true,
        filter: (list) => {


            // Filter duplicates
            // incase of multiple data keys usage
            const filteredResults = Array.from(
                new Set(list.map((value) => value.match))
            ).map((nombre_producto) => {
                return list.find((value) => value.match === nombre_producto);
            });

            return filteredResults;
        }
    },
    placeHolder: "Buscar...",
    resultsList: {
        element: (list, data) => {
            const info = document.createElement("p");
            info.classList.add("pe-2");
            info.classList.add("ps-2");
            info.classList.add("pt-2");

            if (data.results.length > 0) {
                info.innerHTML = `Mostrar <strong>${data.results.length}</strong> fuera de los <strong>${data.matches.length}</strong> resultados`;
            } else {
                info.innerHTML = `Encontrado <strong>${data.matches.length}</strong> resultados que coinciden con <strong>"${data.query}"</strong>`;
            }
            list.prepend(info);


        },
        noResults: true,
        maxResults: 15,
        tabSelect: true
    },
    resultItem: {
        element: (item, data) => {
            // Modify Results Item Style

            item.classList.add("match");

            item.style = "display: flex; justify-content: space-between;";
            // Modify Results Item Content

            if (data.value.sku == "suscripcion-sasi") {
                var hrefCurso = "/suscripcion"
            }
            else {
                var hrefCurso = "/detalle-curso/" + data.value.sku
            };

            item.innerHTML = `<a  href="${hrefCurso}" class="d-flex btn-search-product justify-content-between w-100">

            <div clas="contenedor " style="display: flex; justify-content: space-between;">
                <img class="img-search" src="${"https://sasi.cl/storage/" + data.value.imagen_producto}">
                </img>
                <span class="text-start text-dark course-title ps-2 fs-6 mt-1" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                    ${data.match.length > 35 ? data.match.substring(0, 35) + '<span>...</span>' : data.match}
                </span>
            </div>

            <span class="text-dark" style="display: flex; align-items: center; font-size: 13px; font-weight: 100; text-transform: uppercase;">
            ${data.value.precio}
            </span>

        </a>`;
        },
        highlight: true
    },
    events: {
        input: {
            focus: () => {
                if (autoCompleteJS.input.value.length) autoCompleteJS.start();
            }
        }
    }
});


$(document).on('mousemove', '.match', function (e) {
    console.log(e);
    console.log("Llego");

});



// Attach Smoove to elements and set default options
$(".animup").smoove({
    offset: '10%',
    // moveX is overridden to -200px for ".bar" object
    moveY: '100px',
});
$(".anidown").smoove({
    offset: '20%',
    // moveX is overridden to -200px for ".bar" object
    moveY: '-100px',
});
$(".animleft").smoove({
    offset: '15%',
    // moveX is overridden to -200px for ".bar" object
    moveX: '100px',
});
$(".animleftbig").smoove({
    offset: '15%',
    // moveX is overridden to -200px for ".bar" object
    moveX: '50%',
    transformOrigin: '50%',
});
$(".animright ").smoove({
    offset: '15%',
    // moveX is overridden to -200px for ".bar" object
    moveX: '-100px',
});
$(".animrightbig").smoove({
    offset: '15%',
    // moveX is overridden to -200px for ".bar" object
    moveX: '-100px',
    transformOrigin: '100%',
});
$(".animrightbig-2").smoove({
    offset: '12.5%',
    // moveX is overridden to -200px for ".bar" object
    moveX: '-100px',
    transformOrigin: '50%',
});
$(".animrightbig-3").smoove({
    offset: '20%',
    // moveX is overridden to -200px for ".bar" object
    moveX: '-100px',
    transformOrigin: '50%',
});
$(".animrightbig-4").smoove({
    offset: '20%',
    // moveX is overridden to -200px for ".bar" object
    moveX: '-100px',
    transformOrigin: '50%',
});
$(".animrot").smoove({
    offset: '50%',
    rotateY: '180deg',

});
$(".animscale").smoove({
    offset: '50%',
    scaleX: '1.5',
    opacity: '50',

});
$('.counter').each(function () {
    var $this = $(this),
        countTo = $this.attr('data-count');

    $({
        countNum: $this.text()
    }).animate({
        countNum: countTo
    }, {
        duration: 3000,
        easing: 'linear',
        step: function () {
            $this.text(Math.floor(this.countNum));
        },
        complete: function () {
            $this.text(this.countNum);
            //alert('finished');
        }

    });

});


AOS.init();
//logica carrito de compra
$(document).ready(function () {

    $(".alertaModalPerfilNombre").css("display", "none");
    $(".alertaModalPerfilApellido").css("display", "none");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const standalone = window.navigator.standalone;
    const userAgent = window.navigator.userAgent.toLowerCase();
    const ios = /iphone|ipod|ipad/.test(userAgent);
    if (ios) {
        $('.hero').css('background-attachment', 'inherit');
        $('.banner_kids').css('background-attachment', 'inherit');
        $('.kids-banner-2').removeClass("fs-3").addClass("fs-4")

    }
    let productos = sessionStorage.getItem("carrito");
    var listacarrito = [];
    var storageCar = $(".productList");
    var carTotal = 0;
    $(".cartTotal").text(carTotal);
    storageCar.empty();
    if (productos) {
        var listacarrito = JSON.parse(productos);
        var count = Object.keys(listacarrito.productos).length;
        if (count > 0) {
            var Cesta = listacarrito.productos;
            $.each(Cesta, function (key, value) {
                let htmlProductoStorage = '<div class="col-3 col-lg-2 cursomodal' + value.idlms + '" ><img class="img-pedido w-100 rounded rounded-3 cursomodal' + value.idlms + '" src="' + value.imagen + '" alt="' + value.nombre + '"></div><div class="col-6 col-lg-7 cursomodal' + value.idlms + '"><p class="fs-6 cursomodal' + value.idlms + '">' + value.nombre + '</p></div><div class="col-3 cursomodal' + value.idlms + '"><p class="text-end fs-6">' + value.precio + '</p><a href="#" class="text-decoration-none me-2 eliminarProductoCarrito" data-idcursoeliminar=' + value.idlms + '><p class="fs-6 d-inline-block icon-trash text-secondary float-end"></p></a></div>';
                var unitPrice = value.precio.replace("$ ", "");
                var cleanunitPrice = unitPrice.replace(".", "");
                carTotal = carTotal + parseInt(cleanunitPrice);
                storageCar.append(htmlProductoStorage);
            });
            var finalAmount = new Intl.NumberFormat('de-DE').format(carTotal);
            $(".cartTotal").text("$ " + finalAmount);
        }
    }
    //en el doc ready
    cartQtty(true);

    //eliminar productos del carro
    $('.eliminarProductoCarrito').click(function (event) {
        event.preventDefault();
        let idCursoLms = $(this).data("idcursoeliminar");
        let selector = ".cursomodal" + idCursoLms;
        if (idCursoLms != undefined) {
            //se recorre el array
            listacarrito["productos"].map((p, i) => {
                if (p.idlms == idCursoLms) {
                    // llama Evento add_to_cart GoogleTagManager
                    remove_to_cart(listacarrito["productos"][i]);
                    //acá elimina del carrito y actualiza el cartQtty
                    listacarrito["productos"].splice(i, 1);
                    $(".curso" + idCursoLms).hide();
                }
            });
            //acá crear la peticion ajax con el json stringify del carrito
            //se elimina de la sessionb
            sessionStorage.setItem("carrito", JSON.stringify(listacarrito));
            $(selector).remove();
            //crear una funcion para recalcular el cartTotal
            //calculateTotalCart();
            //acá se trae el cart del lado
            cartQtty(true);
            cartTotal();
        } else {
            console.log("error");
        }
    });

    const validado = localStorage.getItem("validacionCla");
    //validamos si el usuario ya se valido
    if(validado !== null){
        $("#btnFnCmp").removeClass("d-none");
    }else{
        $('.finalvalidation').removeClass('d-none');
    }

    $(".clavalida").click(function(e) {
        e.preventDefault();
        const rut = $("#rutcla").val();
        const email = $('#mailcla').val();
        if (rut.length > 7 || email != "") {
            let rutsinpuntos = rut.replace(".", "");
            let rutlimpio = rut.replace("-", "");
            let caja_url = "/clavalida/"+rutlimpio;
            $.ajax({
                url: caja_url,
                type: 'GET',
                success: function(res) {
                    if(res.codigo === 200){
                        swal({
                            title: "Exito!",
                            text: "Fue validado de manera exitosa.",
                            icon: 'success',
                            timer: 5000
                        });
                        localStorage.setItem('validacionCla', true);
                        $('#Modal-caja').modal('hide');
                        var URLactual = window.location;
                        if(URLactual == "https://cajalosandes.sasi.cl/FinalizarCompra"){
                            console.log("igual");
                            $("#btncompramodal").addClass('d-none');
                            $(".btncompraWebpay").removeClass('d-none');
                        }
                        //alert(URLactual);
                    }else{
                        swal({
                            title: "Disculpa!",
                            text: "El rut suministrado no se encuentra afiliado a Caja los Andes.",
                            icon: 'error',
                            timer: 5000
                        });
                    }
                }
            });


        } else {
            alert("favor ingresa tu rut o email");
        }

    });

});


$image_crop = $('#image_demo').croppie({
    enableExif: true,
    // enableResize: true,
    viewport: {
        width: 250,
        height: 250,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});


function b64toBlob(b64Data, contentType, sliceSize) {
    contentType = contentType || '';
    sliceSize = sliceSize || 512;

    var byteCharacters = atob(b64Data);
    var byteArrays = [];

    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

    var blob = new Blob(byteArrays, { type: contentType });
    return blob;
};

$('.loginSasi').click(function (e) {
    e.preventDefault();
    //ocultar el campo de errores
    $(".alertaErrorInicioSesion").css("display", "none");
    var txtPassword = $("#txtPassword").val();
    var txtUserName = $("#nombrep").val();
    if (txtUserName == "") {
        //mostrar el campo de errores en caso de que sea necesario para mostrar un error en especifico Handle Error
        $(".alertaErrorInicioSesion").css("display", "block");
        $(".alertaErrorInicioSesion").html("El nombre de usuario es requerido.");
        return;
    } else if (txtPassword == "") {
        //mostrar el campo de errores en caso de que sea necesario para mostrar un error en especifico Handle Error
        $(".alertaErrorInicioSesion").css("display", "block");
        $(".alertaErrorInicioSesion").html("La contraseña es requerida.");
        return;
    } else if (txtPassword.length < 3) {
        //mostrar el campo de errores en caso de que sea necesario para mostrar un error en especifico Handle Error
        $(".alertaErrorInicioSesion").css("display", "block");
        $(".alertaErrorInicioSesion").html("La contraseña es demasiado corta.");
        return;
    }
    $.ajax({
        url: "/login",
        type: 'POST',
        data: {
            "email": txtUserName,
            "password": txtPassword
        },
        dataType: 'json', // added data type
        success: function (res) {
            console.log(res);
            if (res.ok) {
                if (window.location.pathname == "/FinalizarCompra") {
                    location.reload();
                } else {
                    window.location = "{{ route('perfil')}}";
                }
            } else {
                swal({
                    title: "Error!",
                    text: "Credenciales incorrectas",
                    type: "error",
                    icon: 'error',
                    timer: 1000
                });
            }
        }
    });
});

$(".btnComprar").click(function (event) {
    event.preventDefault();
    let items = sessionStorage.getItem("carrito");
    let pname = $(this).data("pname");
    let pprice = $(this).data("price");
    let ppriceold = $(this).data("panterior");
    let pimg = $(this).data("img");
    let pid = $(this).data("id");
    let idlms = $(this).data("idlms");
    let nombreprof = $(this).data("profname");
    var cartOpen = $('#offcanvasScrolling').hasClass('show');
    let item = { "id": pid, "idlms": idlms, "nombre": pname, "precio": pprice, "pold": ppriceold, "imagen": pimg, "profname": nombreprof }
    const validadoCla = localStorage.getItem("validacionCla");

    //validamos si el usuario ya se validó
    if(validadoCla === null){
        $('#Modal-caja').modal('toggle');
        //console.log("usuario no validado - condición: "+validadoCla)
    }else{
        //console.log("usuario validado - condición: "+validadoCla)
    }

    if (items != "" && items != null) {
        //ya existen productos en el carrito
        var listacarrito = JSON.parse(items);
        let existe = listacarrito["productos"].some(item => item.id === pid);

        //console.log(existe);
        //quedé en hacer la validación para ver por qué se elimina la variable de sesión
        if (!existe) {
            if (listacarrito["productos"].length > 0) {//validamos si ya tenemos productos en el carrito
                //limpiamos carrito y sesion
                //listacarrito["productos"] = [];
                sessionStorage.clear();
                //console.log(listacarrito["productos"]);
                //llenamos solo con suscripción
                listacarrito["productos"].push(item);
                // llama Evento add_to_cart GoogleTagManager
                add_to_cart(item);
                sessionStorage.setItem("carrito", JSON.stringify(listacarrito));
                cartQtty(true);
                let cartList = $(".productList");
                let htmlProducto = '<div class="col-3 col-lg-2 cursomodal' + idlms + '"><img class="img-pedido w-100 rounded rounded-3 cursomodal' + idlms + '" src="' + pimg + '" alt="' + pname + '"></div><div class="col-6 col-lg-7 cursomodal' + idlms + '"><p class="fs-6">' + pname + '</p></div><div class="col-3 cursomodal' + idlms + '"><p class="text-end fs-6">' + pprice + '</p><a href="#" class="text-decoration-none me-2 eliminarProductoCarrito" onclick="eliminarCarrito(event,' + idlms + ')"><p class="fs-6 d-inline-block icon-trash text-secondary float-end"></p></a></div>';
                //$(".productList").empty();
                cartList.append(htmlProducto);
                cartTotal();

                if (cartOpen) {
                    //modal abierta solo queda agregar el producto
                } else {//modal cerrada, se abre la modal y se agrega el producto
                    $("#btnCar").click();
                }
            } else {
                listacarrito["productos"].push(item);
                // llama Evento add_to_cart GoogleTagManager
                add_to_cart(item);
                sessionStorage.setItem("carrito", JSON.stringify(listacarrito));
                cartQtty(true);
                //procedemos a agregar el producto en la modal como html
                let cartList = $(".productList");
                let htmlProducto = '<div class="col-3 col-lg-2 cursomodal' + idlms + '"><img class="img-pedido w-100 rounded rounded-3 cursomodal' + idlms + '" src="' + pimg + '" alt="' + pname + '"></div><div class="col-6 col-lg-7 cursomodal' + idlms + '"><p class="fs-6">' + pname + '</p></div><div class="col-3 cursomodal' + idlms + '"><p class="text-end fs-6">' + pprice + '</p><a href="#" class="text-decoration-none me-2 eliminarProductoCarrito" onclick="eliminarCarrito(event,' + idlms + ')"><p class="fs-6 d-inline-block icon-trash text-secondary float-end"></p></a></div>';
                cartList.append(htmlProducto);
                cartTotal();

                if (cartOpen) {
                    //modal abierta solo queda agregar el producto
                } else {//modal cerrada, se abre la modal y se agrega el producto
                    $("#btnCar").click();
                }
            }
        } else {
            swal("Oops", "Disculpa no puedes agregar este producto al carrito!", "error")
        }
    } else {
        // console.log("lista sin productos entonces agregar el primero");
        let productjson = {
            "productos": [
                item
            ]
        }
        // llama Evento add_to_cart GoogleTagManager
        add_to_cart(item);
        sessionStorage.setItem("carrito", JSON.stringify(productjson));

        //procedemos a agregar el producto en la modal como html
        let cartList = $(".productList");
        let htmlProducto = '<div class="col-3 col-lg-2 cursomodal' + idlms + '"><img class="img-pedido w-100 rounded rounded-3 cursomodal' + idlms + '" src="' + pimg + '" alt="' + pname + '"></div><div class="col-6 col-lg-7 cursomodal' + idlms + '"><p class="fs-6">' + pname + '</p></div><div class="col-3 cursomodal' + idlms + '"><p class="text-end fs-6">' + pprice + '</p></div>';
        cartList.append(htmlProducto);
        cartTotal();
        if (cartOpen) {//modal abierta solo queda agregar el producto

        } else {//modal cerrada, se abre la modal y se agrega el producto
            $("#btnCar").click();
        }
    }
});

//esta función se encarga de validar y guardar en la sesión de laravel los productos del carrito
function cartQtty(actualizarSession) {
    let productos = sessionStorage.getItem("carrito");
    var listacarrito = [];
    if (productos) {
        var listacarrito = JSON.parse(productos);
        var count = Object.keys(listacarrito.productos).length;
        $(".caritems").text(count);
    } else {
        $(".caritems").text("0");
    }
    //guardar en la session de laravel
    // if (actualizarSession) {
    //     $.ajax({
    //         url: "/guardar-carrito-session",
    //         type: 'POST',
    //         data: {
    //             "carrito": JSON.stringify(listacarrito)
    //         },
    //         dataType: 'json',
    //         success: function (res) {
    //             if (res.ok) {
    //                 if (JSON.parse(productos).productos.length != JSON.parse(res.xjs).productos) {
    //                     //acá actualizar la session en el localStorage
    //                     sessionStorage.setItem("carrito", JSON.stringify(JSON.parse(res.xjs)));
    //                     //ahora actualizar el listado lateral del carrito y además si esta en la pestaña de /carrito se eliminan ahi tambien
    //                     res.idsNoDisponible.map((id) => {
    //                         //$(".curso"+id).hide();
    //                         //$(".cursomodal"+id).hide();
    //                         //agregar el display none important en caso de que haya un flex important
    //                         $('.curso' + id).attr("style", "display: none !important");
    //                         $('.cursomodal' + id).attr("style", "display: none !important");
    //                     });
    //                     //acá actualizar el carrito de arriba la cantidad
    //                     cartQtty(false);
    //                     //llamar a calculate cart para actualizar el total
    //                     cartTotal();
    //                 }
    //             }
    //         }
    //     });
    // }
};

function cartTotal() {
    let productos = sessionStorage.getItem("carrito");
    let carTotal = 0;
    var listacarrito = JSON.parse(productos);
    let Cesta = listacarrito.productos;
    $.each(Cesta, function (key, value) {
        let unitPrice = value.precio.replace("$ ", "");
        let cleanunitPrice = unitPrice.replace(".", "");
        carTotal = carTotal + parseInt(cleanunitPrice);
    });
    let finalAmount = new Intl.NumberFormat('de-DE').format(carTotal);
    $(".cartTotal").text("$ " + finalAmount.split(',')[0]);

};

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
};

function calculateTotalCart() {
    carTotal = 0;
    listacarrito["productos"].map((p, i) => {
        let unitPrice = p.precio.replace("$ ", "");
        let cleanunitPrice = unitPrice.replace(".", "");
        carTotal = carTotal + parseInt(cleanunitPrice);
    });
    let finalAmount = new Intl.NumberFormat('de-DE').format(carTotal);
    $(".cartTotal").text("$ " + finalAmount);
};

function eliminarCarrito(evt, idlms) {
    evt.preventDefault();
    var items = sessionStorage.getItem("carrito");
    var listacarrito = JSON.parse(items);
    let idCursoLms = idlms;
    let selector = ".cursomodal" + idCursoLms;
    if (idCursoLms != undefined) {
        //se recorre el array
        listacarrito["productos"].map((p, i) => {
            if (p.idlms == idCursoLms) {
                // llama Evento add_to_cart GoogleTagManager
                remove_to_cart(listacarrito["productos"][i]);
                //acá elimina del carrito y actualiza el cartQtty
                listacarrito["productos"].splice(i, 1);
                $(".curso" + idCursoLms).hide();
            }
        });
        //acá crear la peticion ajax con el json stringify del carrito
        //se elimina de la sessionb
        sessionStorage.setItem("carrito", JSON.stringify(listacarrito));

    }
};



// Cambio de formulario en modal de login

$('.link-registro').click(function (e) {
    e.preventDefault();
    $('.inicio-sesion').addClass("d-none");
    $('.registro').removeClass("d-none")
});

$('.link-inicio-sesion').click(function (e) {
    e.preventDefault();
    $('.registro').addClass("d-none");
    $('.olvido-contrasena').addClass("d-none");
    $('.inicio-sesion').removeClass("d-none")
});

$('.link-olvido-contrasena').click(function (e) {
    e.preventDefault();
    $('.inicio-sesion').addClass("d-none");
    $('.olvido-contrasena').removeClass("d-none")
});

// fin Cambio de formulario en modal de login

/**/
setTimeout(() => {
    let url_actual = window.location.pathname;
    //console.log(url_actual);
    //alert("ocultar suscripción");
    if (url_actual != ("/")) {
        $("#Publicidad").addClass("d-none");
    }

}, "10000");

var temporizador;

/*function validarRut(rut) {
  clearTimeout(temporizador);
  temporizador = setTimeout(function () {
    var rutRegex = /^[0-9]+-[0-9kK]{1}$/;

    if (!rutRegex.test(rut)) {
      alert("El Rut ingresado no es válido");
    }
  }, 500); // Espera 500 milisegundos después de la última tecla presionada
}*/
let $comment = document.getElementById("rutcla")
let timeout


//El evento lo puedes reemplazar con keyup, keypress y el tiempo a tu necesidad
/*$comment.addEventListener('keydown', () => {
    var rut = $('#rutcla').val();
    clearTimeout(timeout)
    timeout = setTimeout(() => {
        validarRut(rut)
        clearTimeout(timeout)
    }, 1000)
})*/

function validarRut(rut) {
    var regex = /^0*(\d{1,3}(\.?\d{3})*)\-?([\dkK])$/;

    if (regex.test(rut)) {
        var rutSinFormato = rut.replace(/\./g, '').replace('-', '');
        var cuerpo = rutSinFormato.slice(0, -1);
        var digitoVerificador = rutSinFormato.slice(-1).toUpperCase();
        var suma = 0;
        var multiplo = 2;

        for (var i = cuerpo.length - 1; i >= 0; i--) {
            suma += multiplo * parseInt(cuerpo.charAt(i));
            if (multiplo < 7) {
                multiplo += 1;
            } else {
                multiplo = 2;
            }
        }

        var digitoCalculado = 11 - (suma % 11);
        digitoCalculado = (digitoCalculado === 11) ? 0 : (digitoCalculado === 10) ? 'K' : digitoCalculado.toString();

        if (digitoCalculado === digitoVerificador) {
            alert('Rut válido');
        } else {
            alert('Rut inválido');
        }
    } else {
        alert('Formato de Rut inválido');
    }
}


