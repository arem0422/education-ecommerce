@push('cssOpcionales')

@endpush

<div class="modal fade" id="Modal-caja" tabindex="-1" aria-labelledby="ModalcajaLabel" aria-hidden="true">
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

                <div class="d-none d-md-flex col-md-7 p-0 m-0">
                    <img class="w-100" src="{{ asset('img/sasi-caja.jpg') }}" alt="Mujer con celular">
                </div>
                <div class="col-12 col-md-5 p-0 m-0">
                    <div class="row m-0 p-0 aling-item-center">
                        <div class="col-12 p-0 m-0">
                            <img class="w-25 float-end m-4" src="https://static.vgroup.cl/2023/05/SASI/SASI.png" alt="Logo Sasi">
                        </div>
                        <div class="col-12 col-md-10 col-lg-10 p-0 m-0 px-1">
                            {{-- Formulario caja los andes --}}
                                <div class="modal-body">
                                    <div class="mt-lg-5">
                                        <h1 class="fs-4 text-center mb-3 fw-bold">Validación Caja los Andes</h1>

                                        <div class="mb-2">
                                            <h1 class="form-label text-dark fs-8 fw-bold">Por favor ingrese su RUT de miembro Caja los Andes para acceder a su descuento del 100%.</h1>
                                            <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Introduzca su RUT sin puntos y con guion ej: 12265794-1</label>
                                            <input type="text" class="form-control" id="rutcla" placeholder="RUT">
                                            <input type="text" class="form-control mt-1" id="mailcla" placeholder="Email">
                                        </div>
                                        <div class="mb-2 mt-3 row justify-content-center">
                                            <div class="col-12 col-lg-6 px-1 m-0">
                                                <a href="#" class="btn bg-primario my-1 w-100 shadow clavalida text-light">Validarme</a>
                                                <a href="https://www.sasi.cl/cursos" target="_blank" class="btn btn-info my-1 w-100 shadow text-white">No soy afiliado pero quiero adquirir el curso</a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scriptsOpcionales')
@endpush

