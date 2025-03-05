@extends('layouts.nav')
@section('content')
<br>
    <div class="row container-fluid mb-1 m-0 p-0">
        <div class="col-12 col-md-6 ms-0 ms-lg-5 ps-md-5" >
            <div class="row mt-3">
                <h1> Transacción creada. </h1>
                <p class="-mt-4 mb-4">Ahora, con los datos recibidos se debe redirigir al usuario a webpay a la url indicada y con el token recibidos</p>

                <form method="get" id="formWebpay" action={{  $response->getUrl() }}>
                    <input name="token_ws"  value={{ $response->getToken() }} />

                    <button type="submit">Enviar datos</button>
                </form>
            </div>
        </div>
    </div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script>
    $('#canonical').attr('href', 'https://sasi.cl/webpayplus/returnUrl');
    $('.tituloSasi').html('Sasi Webpay');
    $(document).ready(function(){
        setTimeout(autoClick, 2000);
        function autoClick(){
            document.getElementById("formWebpay").submit();
        };
    });
</script>



@endsection
