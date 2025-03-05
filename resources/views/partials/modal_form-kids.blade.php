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

<div class="modal fade" id="Modalformkids" tabindex="-1" aria-labelledby="ModalloginLabel" aria-hidden="true">
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

        <div class="modal-content m-0 p-0" style="background-color: #FF296B">
            <div class="row m-0 p-0 position-relative">

                <button id="close-login" type="button" class="border-0 text-gris bg-transparent icon-close fs-2 py-2 fw-normal cerrar-public position-absolute text-start" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="d-none d-md-flex col-md-5 p-0 m-0">
                    <img class="w-100" src="{{ asset('img/Sasi_kids.jpg') }}" alt="Sasi Bot">
                </div>
                <div class="col-12 col-md-7 p-0 m-0">
                    <div class="row m-0 p-0 aling-item-center">
                        <div class="col-12 p-0 m-0">
                            <img class="w-25 float-end m-4" src="{{ asset('img/logo-SASI-kids-chico.png') }}" alt="Logo Sasi Kids">
                        </div>
                        <div class="col-12 col-md-10 col-lg-10 p-0 m-0 px-1">
                            {{-- formulario de inscripcion --}}
                            <form action="" id="formRegistrase" class="mt-lg-5 mb-5 registro">
                                @csrf
                                <div class="">
                                    <div class="row m-0 p-0">
                                        <h1 class="fs-3 text-center mb-3 text-white fw-bold text-shadow">Suscríbete a nuestros cursos Sasi Kids</h1>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos text-white">Nombre Tutor<p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="text" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 name_buy nameTutor" name="name_buy" placeholder="Nombre">
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos text-white">Apellido Tutor<p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="text" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 lastname_buy lastNameT" name="lastname_buy" placeholder="Apellido">
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos text-white">Correo electrónico Tutor<p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="mail" id="originalMail" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 mail_buy emailTutor" name="mail_buy" placeholder="Correo electrónico">
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos text-white">Confirmar Correo <p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="mail" id="alternativeMail" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 alternativeMail" placeholder="Correo electrónico">
                                            <small id="alertmail" class="text-danger fs-8 d-none">Disculpe los emails no coinciden</small>
                                        </div>
                                        <div class="col-12 col-lg-6 p-0 px-1">
                                            <label for="" class="d-block fs-8 mb-2 texto-productos text-white">RUT Tutor<p class="d-inline-block text-danger m-0">*</p></label>
                                            <input type="mail" id="rutTutor" class="form-control w-100 d-inline-block rounded border-0 py-1 m-0 mb-2 alternativeMail rutTutor" placeholder="RUT">
                                        </div>

                                        <div class="col-12 px-1 pt-3 m-0">
                                            <button type="submit" class="btn bg-primario my-1 w-100 shadow btnRegistrateLogin kidsform-btn" aria-label="Close">Inscribirme</button>
                                        </div>
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

        //ajax sasiKids
        $(document).on('click', '.kidsform-btn', function(e) {
            e.preventDefault();

            var nombreT = $(".nameTutor").val();
            var apellidoT = $(".lastNameT").val();
            var mailT = $(".emailTutor").val();
            var rutT = $(".rutTutor").val();
            var token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{URL::route("sasiKidsSendForm")}}',
                type: 'POST',
                data: {
                    _token: token,
                    nombre: nombreT,
                    apellido: apellidoT,
                    email: mailT,
                    rut: rutT,
                },
                success: function(response) {
                    swal({
                            title: response.title,
                            text: response.text,
                            // type: response.status,
                            icon: response.icon,
                            timer: response.timer
                    });

                    // if(response.status !== 'success'){
                    //     $('#Modalformkids').modal('show');
                    // }
                }

            });

        });
    </script>
@endpush

