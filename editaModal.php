<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" 
aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="guarda.php" method="post" enctype="multipart/form-data" >

            <input type="hidden" id="id" name="id">

            <div class="md-3">
                <label for="ID" class="form-label">ID:</label>
                <input type="text" name="ID" id="ID" class="form-control" required>
            </div>

            <div class="md-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="md-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>

            <div class="md-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="text" name="edad" id="edad" class="form-control" required>
            </div>

            <div class="md-3">
                <label for="pulsera" class="form-label">Pulsera:</label>
                <input type="text" name="pulsera" id="pulsera" class="form-control" required>
            </div>


            <div class="mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerra</button>
                <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-floppy-disk"></i> Guadar</button>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>