<div class="modal fade" id="Modalempresas" tabindex="-1" aria-labelledby="ModalempresasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: #EAEAEA">
        <div class="modal-header">
          <h5 class="modal-title fs-3 text-dark" id="ModalempresasLabel">Contáctanos</h5>
          <button type="button" class="btn-close bi bi-x" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" id="contactoForm" class="contactoForm">
        <div class="modal-body">
          <div class="row">
                <div class="mb-2">
                    <label for="nombreContacto" class="form-label text-dark fs-6">Nombre de contacto</label>
                    <input type="text" class="form-control" id="nombreContacto" required placeholder="Nombre de contacto">
                </div>
                <div class="mb-2">
                    <label for="nombreEmpresa" class="form-label text-dark fs-6">Nombre empresa</label>
                    <input type="text" class="form-control" id="nombreEmpresa" required placeholder="Nombre empresa">
                </div>
                <div class="mb-2">
                    <label for="mailEmpresa" class="form-label text-dark fs-6">Email</label>
                    <input type="email" class="form-control" id="mailEmpresa" required placeholder="name@example.com">
                </div>
                <div class="mb-2">
                    <label for="fonoEmpresa" class="form-label text-dark fs-6">Teléfono</label>
                    <input type="tel" class="form-control" id="fonoEmpresa" required placeholder="+56-940845788">
                </div>
                <div class="mb-2">
                    <label for="motivoEmpresa" class="form-label text-dark fs-6">Motivo de su contacto</label>
                    <textarea class="form-control" id="motivoEmpresa" rows="3"></textarea>
                </div>
                <input type="hidden" name="subject" id="subject" value="">
                <div class="col-12">
                  <div class="text-center">
                    <small id="submitext" class="text-success d-none">Gracias, pronto te contactaremos</small>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="background-color: #FCDC04 !important; border-color: #FCDC04 !important;">Enviar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div>
</div>
