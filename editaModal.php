<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Editar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actualiza.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" id="id" name="id">

                    <div class="mb-2">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" required>
                    </div>

                    <div class="mb-2">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" rows="5" required></textarea>
                    </div>

                    <div class="mb-2">
                        <img id="img_poster" width="150" height="150" class="img-thumbnail">
                    </div>


                    <div class="mb-3">
                        <label for="poster" class="form-label">Poster:</label>
                        <input type="file" name="poster" id="poster" class="form-control form-control-sm" accept="image/*" onchange="document.querySelector('#editaModal #img_poster').src = window.URL.createObjectURL(this.files[0])">
                    </div>

                    <div class="d-flex justify-content-end pt2">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary ms-1"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>