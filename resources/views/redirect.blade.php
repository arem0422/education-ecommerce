@extends('layouts.nav')

@section('content')
<style>
    .lds-ring {
        display: inline-block;
        position: relative;
        width: 60px;
        height: 60px;
    }
    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 60px;
        height: 60px;
        margin: 5px;
        border: 8px solid red;
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: #fcdc04 transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }
    @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div style="height: 60vh !important;display: flex;justify-content: center;align-content: center;align-items: center;">
    <span class="fw-bold" style="font-size: large">Redireccionando...</span>
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
</div>
@endsection

<script>
    $('#canonical').attr('href', 'http://sasi.cl/redirect');
    $('.tituloSasi').html('Redireccionando...');
    var target = <?php echo json_encode($target) ?>;
    sessionStorage.removeItem("carrito");
    if(target == "home"){
        window.location.href = "/";
    }else{
        window.location.href = "/perfil";
    }
</script>
