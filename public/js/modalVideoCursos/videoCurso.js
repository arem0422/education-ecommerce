const exampleModal = document.getElementById('exampleModal');
exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const urlvido = button.getAttribute('data-video');
    const tituloProd = button.getAttribute('data-titulo');
    /* console.log(tituloProd) */
    const nombreProf = button.getAttribute('data-profesor');
    const descripcionProd = button.getAttribute('data-descripcion');
    const descuentoProd = button.getAttribute('data-descuento');
    const precioProd = button.getAttribute('data-precio');
    const urldetalle = button.getAttribute('data-urldetalle');
    var videoparse = urlvido.toString();
  	var porciones = videoparse.split('/');
    var vimeoid = porciones[3];
  	var vimeourl = "https://player.vimeo.com/video/"+vimeoid;
    $('.videoProd').attr("src", vimeourl);
    $('.nombreCurso').text(tituloProd);
    $('.Profe').text(nombreProf);
    $('.descripcionProducto').html(descripcionProd);
    $('.antes').text("Antes: $" + descuentoProd);
    $('.ahora').text("Precio: $" + precioProd);
    $('#rutadetalle').attr("href", "/detalle-curso/" + urldetalle);






    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
})
