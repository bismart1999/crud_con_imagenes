
<div class="modal fade" id="cerrarSesionModal" tabindex="-1" aria-labelledby="cerrarSesionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="cerrarSesionModalLabel">Aviso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea Cerrar Sesion?
            </div>

            <div class="modal-footer">
            
                <form action="cerrarSesion.php" method="post">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a type="button" href="cerrarSesion.php" class="btn btn-danger">Aceptar</a>
                </form>
            </div>

        </div>
    </div>
</div>