<section class="footer-area responsive-content bg-gris" id="footer-b">
    <hr class="linea2 m-0 p-0 text-white mb-5">
    <div class="footer-fluid ">
        <div class="container-fluid position-relative bottom-0">
            <div class="row footer-list p-0 m-0">
                <div class="col-12 col-md-6 col-lg-3 mt-1 p-0 m-0">
                    <ul>
                        <li class="dotless ms-4 my-2"><a class="text-primario fs-4 text-decoration-none link-footer" href="/cursos">Cursos para la vida</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/cursos/Recientes">Recientes</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/cursos/Populares">Populares</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/cursos/Vida_Sana">Vida sana</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/cursos/Estilo_de_Vida">Estilo de vida</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/cursos/Crecimiento_Profesional">Crecimiento Profesional</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mt-1 p-0 m-0">
                    <ul>
                        <li class="dotless ms-4 my-2"><a class="text-primario fs-4 text-decoration-none link-footer" href="/">Sasi para personas</a></li>
                        @if(session()->get('userSession'))
                            <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/perfil">Mi Perfil</a></li>
                            <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/perfil#mis_cursos">Mis cursos</a></li>
                        @else
                                <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="" data-bs-toggle="modal" data-bs-target="#Modallogin">Iniciar sesión</a></li>
                                <li class="dotless ms-4 my-2"><a class="registerbanner text-white fs-6 text-decoration-none link-footer" href="" data-bs-toggle="modal" data-bs-target="#Modallogin">Regístrate gratis</a></li>
                        @endif
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/suscripcion">Suscripción Sasi</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/#newsletter">Regístrate en nuestro Newsletter</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/#video">¿Por qué estudiar con Sasi?</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mt-1 p-0 m-0">
                    <ul>
                        <li class="dotless ms-4 my-2"><a class="text-primario fs-4 text-decoration-none link-footer" href="/empresas">Sasi para empresas</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/empresas#por_que_nos_eligen">¿Por qué nos eligen las empresas?</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/empresas#suscripcion_empresas">Suscripción para empresas</a></li>
                    </ul>
                    <ul>
                        <li class="dotless ms-4 my-2"><a class="text-primario fs-4 text-decoration-none link-footer" href="">Información</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/informacion/preguntas">Preguntas Frecuentes</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-6 text-decoration-none link-footer" href="/informacion/sobre-sasi">Sobre Sasi</a></li>
                    </ul>

                </div>
                <div class="col-12 col-md-6 col-lg-3 mt-1 p-0 m-0">
                    <ul>
                        <li class="dotless ms-4 my-2"><a class="text-primario fs-4 text-decoration-none link-footer" href="">Contáctanos</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-5 text-decoration-none link-footer icon-facebook-square" href="https://web.facebook.com/sasi.cl?_rdc=1&_rdr" target="_blank"> </a><a class="text-primario fs-6 text-decoration-none link-footer" href="https://web.facebook.com/sasi.cl?_rdc=1&_rdr" target="_blank">Facebook</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-5 text-decoration-none link-footer icon-instagram" href="https://www.instagram.com/sasi.cl/?hl=es" target="_blank"> </a><a class="text-primario fs-6 text-decoration-none link-footer" href="https://www.instagram.com/sasi.cl/?hl=es" target="_blank">Instagram</a></li>
                        <li class="dotless ms-4 my-2"><a class="text-white fs-5 text-decoration-none link-footer icon-mail_outline" href="" target="_blank"> </a><a class="text-primario fs-6 text-decoration-none link-footer" href="mailto:hola@sasi.cl" target="_blank">hola@sasi.cl</a></li>
                    </ul>
                </div>
                {{-- Politica de datos --}}
                <div class="col-12 mt-5 text-center p-0 m-0">
                    <p class="fs-6 text-white">Todos los derechos reservados VGroup Transformación Digital, <a href="/informacion/politicas" class="text-primario" id="politica">Política de uso de datos</a></p>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end footer-fluid -->
</section>

@push('scriptsOpcionales')
    <script>

        $(document).ready(function(){
            //se trae la data del usuario para saber si esta logeado
            var usuarioLogeado = <?php echo json_encode(session()->get('userSession')) ?>;
            if(usuarioLogeado != null){
                $("#btnIniciarSesionFooter").html("Mi Perfil");
            }else{
                $("#btnIniciarSesionFooter").html("Iniciar sesión");
            }


            $("#btnIniciarSesionFooter").click(function(e){
              e.preventDefault();
              if(usuarioLogeado != null){
                window.location.href = "/perfil";
              }else{
                $('#Modallogin').modal('show');
              }
            });

            $("#btnRegistrateFooter").click(function(e){
              e.preventDefault();
              $('#Modallogin').modal('show');
            });

            $("#btnSuscripcionSasiFooter").click(function(e){
              e.preventDefault();
              window.location.href = "/suscripcion";
            });

            $("#btnRegistrateNewsletterFooter").click(function(e){
              e.preventDefault();
              swal({
                  title: "Pronto te podrás suscribir!",
                  type: "success",
                  icon: 'info',
                  timer: 4000
              });
            });

        });
        $(".registerbanner").click(function(event){
            event.preventDefault();
            $('.inicio-sesion').addClass("d-none");
            $('.registro').removeClass("d-none")
        })
    </script>
@endpush

