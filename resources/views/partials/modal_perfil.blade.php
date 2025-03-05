@push('cssOpcionales')
    <link rel="stylesheet" href="{{ asset('css/cursos/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cursos/filtro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito/producto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil/recomendaciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/carrousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/cursosHome.css') }}">
@endpush
{{-- nombre fecha de nacimiento, teléfono --}}

<div class="modal fade" id="Modalperfil" tabindex="-1" aria-labelledby="ModalperfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #E5E5E5">
            <div class="modal-header">
                <h5 class="modal-title fs-3 text-dark">Información de perfil</h5>
                <button type="button" class="btn-close bi bi-x" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="perfilFormEditar" class="">
            <div class="modal-body">
            <div class="">
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Nombre</label>
                        <input type="text" class="form-control" id="nombrep" placeholder="Nombre">
                    </div>
                    <input type="text" class="form-control d-none" id="idalumnop" placeholder="idAlumno">
                    <div class="alert alert-danger mt-2 alertaModalPerfilNombre" role="alert">El nombre es requerido</div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Apellido</label>
                        <input type="text" class="form-control" id="apellidop" placeholder="Apellido">
                    </div>
                    <div class="alert alert-danger mt-2 alertaModalPerfilApellido" role="alert">El apellido es requerido</div>
                    {{-- <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Correo Electronico</label>
                        <input type="email" class="form-control" id="emailp" placeholder="name@example.com">
                    </div> --}}
                    {{-- <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label text-dark fs-8">RUT</label>
                        <input type="number" class="form-control" id="rutp" placeholder="01.101.101-1">
                    </div> --}}
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Fecha de nacimiento</label>
                        <input type="text" class="form-control" id="fechap" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="(this.type='text')">
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label text-dark fs-8">Teléfono</label>
                        <input type="tel" class="form-control" id="fonop" placeholder="+56-940845788">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-primario btnGuardarModalPerfilEditar">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
  </div>