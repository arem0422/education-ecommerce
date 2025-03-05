<div class="position-fixed w-100 m-0 p-0 huincha-suscripcion"style="z-index: 100" id="Publicidad">
    <div class="bg-publicidad container-fluid m-0 p-0 position-relative suscripcion">
        <div class="row m-0 p-0 ms-2 ms-lg-5 py-3 position-relative">
            <div class="col-11 col-md-8 col-lg-9 text-center text-md-start">
                <h1 class="fs-5 text-light m-0 p-0 text-shadow fs-movil-2">Cursos ilimitados todo el año </h1>
                <h1 class="fs-4 text-primario m-0 p-0 fw-bold text-shadow fs-movil-2 fs-lg-2">Accede a todos los cursos Sasi por $3.990 mensual</h1>
            </div>
            <div class="col-11 col-md-3 text-center text-md-start">
                <button class="hvr-pulse shadow mt-2 fs-6 fw-normal px-3 px-md-5 py-2 py-md-3 rounded-pill lh-1 btn bg-primario text-uppercase fs-movil-2" type="button" onclick="location.href='/suscripcion'">Suscribirme</button>
            </div>
        </div>
        <div class="position-absolute cerrar-publicidad">
            <button type="button" class="border-0 text-white bg-transparent icon-close fs-4 fw-normal cerrar-public" aria-label="Close"></button>
        </div>
    </div>
</div>

@push('scriptsOpcionales')
    <script>
        $('.cerrar-public').click(function(){
            $('#Publicidad').addClass("d-none")
        })
    </script>
@endpush
