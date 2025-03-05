@push('cssOpcionales')
    <link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito/producto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil/recomendaciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/carrousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/cursosHome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

<div class="modal fade" id="Modallogin" tabindex="-1" aria-labelledby="ModalloginLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl position relative">
        <style>
            @media (min-width: 576px) and (max-width: 999px) {
                .modal-dialog {
                    max-width: 700px !important;
                    margin: 1.75rem auto;
                }
            }
            .swal-footer {
             text-align: center;
            }
        </style>

        <div class="modal-content m-0 p-0" style="background-color: #E5E5E5">
            <div class="row m-0 p-0 position-relative">

                <button id="close-login" type="button" class="border-0 text-white bg-transparent icon-close fs-2 py-2 fw-normal cerrar-public position-absolute text-start" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="d-none d-md-flex col-md-5 p-0 m-0">
                    <img class="w-100" src="{{ asset('img/Sasi_login.jpg') }}" alt="Mujer">
                </div>
                <div class="col-12 col-md-7 p-0 m-0">
                    <div class="row m-0 p-0 aling-item-center">
                        <div class="col-12 p-0 m-0">
                            <img class="w-25 float-end m-4" src="{{ asset('img/Logo_SASI.png') }}" alt="Logo Sasi">
                        </div>
                        <div class="col-12 col-md-10 col-lg-10 p-0 m-0 px-1">
                            {{-- Formulario inicio de sesion --}}
                            <form action="" id="iniciarSesionForm" class="mt-lg-5 mb-5 inicio-sesion">
                                <div class="modal-body">
                                    <div class="mt-lg-5">
                                        <h1 class="fs-3 text-center mb-3">Iniciar Sesión</h1>
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Correo de usuario</label>
                                            <input type="text" class="form-control" id="nombrep" placeholder="Correo de usuario">
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Contraseña</label>
                                            <div class="input-group-append position-absolute" style="z-index: 1; right: 3%">
                                                <button id="show_password_dos" class="btn btn-primary bg-primario" type="button" onclick="mostrarPassword()"> <span class="fs-6 text-gris icon-eye-slash icon"></span> </button>
                                            </div>
                                            <input id="txtPassword" type="Password" Class="form-control position-relative" placeholder="Contraseña">
                                            <div class="alert alert-danger mt-2 alertaErrorInicioSesion" id="alertaErrorInicioSesion" role="alert"></div>
                                            <a href="" class="fs-7 text-secondary link-olvido-contrasena">¿Has olvidado tu contraseña?</a>
                                        </div>
                                        <div class="mb-2 mt-3 row">
                                            <div class="col-12 col-lg-6 px-1 m-0">
                                                <button type="submit" class="loginSasi btn bg-primario my-1 w-100 shadow">Iniciar Sesión</button>
                                            </div>
                                            <div class="col-12 col-lg-6 px-1 m-0">
                                                <button id="link-registro" class="btn btn-secondary my-1 w-100 shadow link-registro">Regístrate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- formulario de usuarios --}}
                            <form action="" id="formRegistrase" class="mt-lg-5 mb-5 registro d-none">
                                <div class="">
                                    <div class="row m-0 p-0">
                                        <h1 class="fs-3 text-center mb-3">Regístrate</h1>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos">Nombre <p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="text" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 name_buy" name="name_buy" placeholder="Nombre">
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos">Apellido <p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="text" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 lastname_buy" name="lastname_buy" placeholder="Apellido">
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos">Correo electrónico <p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="mail" id="originalMail" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 mail_buy" name="mail_buy" placeholder="Correo electrónico">
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos">Confirmar Correo <p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="mail" id="alternativeMail" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 alternativeMail" placeholder="Correo electrónico">
                                            <small id="alertmail" class="text-danger fs-8 d-none">Disculpe los emails no coinciden</small>
                                        </div>

                                        <div class="col-12 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos">Fecha de nacimiento (opcional)</label>
                                            <input type="text" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 bith_buy" name="bith_buy" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="(this.type='text')">
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Contraseña <p class="d-inline-block text-danger m-0">*</p></label>
                                            <input id="txtPassword-2" type="Password" Class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 txtPassword2" placeholder="Contraseña">
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Confirmar Contraseña <p class="d-inline-block text-danger m-0">*</p></label>
                                            <div class="input-group-append position-absolute mostrar-contrasena" style="z-index: 1; right: 10%">
                                                <style>
                                                    @media only screen and (max-width: 575px) {
                                                        .mostrar-contrasena {
                                                           right: 2% !important;
                                                       }
                                                   }
                                               </style>
                                                <button id="show_password" class="btn btn-primary bg-primario py-1" type="button" onclick="mostrarPassword()"> <span class="fs-6 text-gris icon-eye-slash icon"></span> </button>
                                            </div>
                                            <input id="txtPassword-3" type="Password" Class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 txtPassword3" placeholder="Contraseña">
                                        </div>

                                        <div class="alert alert-danger mt-2 alertaBtnRegistrateLogin" id="alertaBtnRegistrateLogin" role="alert"></div>

                                        <div class="col-12 px-1 pt-3 m-0">
                                            <button type="submit" class="btn bg-primario my-1 w-100 shadow btnRegistrateLogin">Regístrate</button>
                                            <a href="" class="fs-7 text-secondary link-inicio-sesion">¿Tienes una cuenta? Inicia sesión</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- Formulario cambio de contraseña --}}
                            <form action="" id="olvidarPassForm" class="mt-lg-5 mb-5 olvido-contrasena d-none">
                                <div class="mt-lg-5 pt-lg-5">
                                    <h1 class="fs-3 text-center mb-3">¿Olvidaste tu contraseña?</h1>
                                    <div class="mb-2">
                                        <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Ingresa tu email</label>
                                        <input type="text" class="form-control" id="email-recu-contrasena" placeholder="Ingresa tu email">
                                        <div class="alert alert-danger mt-2 alertaErrorEmailRecuperar" id="alertaErrorEmailRecuperar" role="alert"></div>
                                    </div>
                                    <div class="mb-2">
                                        <button class="btn bg-primario my-1 w-100 shadow btnRecuperarContrasena">Recuperar contraseña</button>
                                        <a href="" class="fs-7 text-secondary link-inicio-sesion">¿Tienes tu contraseña? Inicia sesión</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scriptsOpcionales')
    <script type="text/javascript">
        //ocultar los botones de las alertas
        $(".alertaErrorEmailRecuperar").css("display", "none");
        $(".alertaErrorInicioSesion").css("display", "none");
        $(".alertaBtnRegistrateLogin").css("display", "none");


        $('.link-registro').click(function(e){
            e.preventDefault();
            $('.inicio-sesion').addClass("d-none");
            $('.registro').removeClass("d-none")
        });

        $('.link-inicio-sesion').click(function(e){
            e.preventDefault();
            $('.registro').addClass("d-none");
            $('.olvido-contrasena').addClass("d-none");
            $('.inicio-sesion').removeClass("d-none")
        });

        $('.link-olvido-contrasena').click(function(e){
            e.preventDefault();
            $('.inicio-sesion').addClass("d-none");
            $('.olvido-contrasena').removeClass("d-none")
        });

        const cerrarModal = document.getElementById('Modallogin')
        cerrarModal.addEventListener('hidden.bs.modal', event => {
            $('.registro').addClass("d-none");
            $('.olvido-contrasena').addClass("d-none");
            $('.inicio-sesion').removeClass("d-none");
        })


        function mostrarPassword(){
                var cambio1 = document.getElementById("txtPassword");
                if(cambio1.type == "password"){
                    cambio1.type = "text";
                    $('.icon').removeClass('icon-eye-slash').addClass('icon-eye');
                }else{
                    cambio1.type = "password";
                    $('.icon').removeClass('icon-eye').addClass('icon-eye-slash');
                };
                var cambio2 = document.getElementById("txtPassword-2");
                if(cambio2.type == "password"){
                    cambio2.type = "text";
                    $('.icon').removeClass('icon-eye-slash').addClass('icon-eye');
                }else{
                    cambio2.type = "password";
                    $('.icon').removeClass('icon-eye').addClass('icon-eye-slash');
                };
                var cambio3 = document.getElementById("txtPassword-3");
                if(cambio3.type == "password"){
                    cambio3.type = "text";
                    $('.icon').removeClass('icon-eye-slash').addClass('icon-eye');
                }else{
                    cambio3.type = "password";
                    $('.icon').removeClass('icon-eye').addClass('icon-eye-slash');
                }
            }

            $(document).ready(function () {
            //CheckBox mostrar contraseña
            $('#ShowPassword').click(function () {
                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
            });
        });

        $('.btnRecuperarContrasena').click(function(e){
            e.preventDefault();
            $(".alertaErrorEmailRecuperar").css("display", "none");
            var email = $('#email-recu-contrasena').val();
            if(email == ""){
                $(".alertaErrorEmailRecuperar").css("display", "block");
                $(".alertaErrorEmailRecuperar").html("El email es obligatorio.");
            }else{
                //post mandar email
                var urlBackRecuperar="https://sasiapp-api.vgroup.cl/api/forget-password";
                $.ajax({
                    url: urlBackRecuperar,
                    // data: {email:"jvargas@vgroup.cl"},
                    data: {email:email.toString()},
                    type: 'POST',
                    success: function (resp){
                        if(resp.msg == "ok"){
                            swal({
                                title: "Enviado!",
                                text: "Se ha enviado un enlace a tu correo.",
                                type: "success",
                                icon: 'success',
                                timer: 2000
                            });
                        }else if(resp.msg == "El correo no existe en la plataforma"){
                          $(".alertaErrorEmailRecuperar").css("display", "block");
                          $(".alertaErrorEmailRecuperar").html("No fué posible encontrar el email, intenta registrarte.");
                        }
                    },
                    error: function(e) {
                        alert('Error: '+e);
                    }
                });
            }
        });



    </script>
    <script>
    $(document).ready(function(){
        const standalone = window.navigator.standalone;
        const userAgent = window.navigator.userAgent.toLowerCase();
        const ios = /iphone|ipod|ipad/.test(userAgent);
        if (ios){
            $('.bith_buy').prop( "onfocus", null );
            $('.bith_buy').prop( "onblur", null );
            $('.bith_buy').attr("type","date");
        }
    })
    </script>
@endpush

