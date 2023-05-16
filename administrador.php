<?php
require 'rutas.php';
session_start();
if (isset($_COOKIE['logeo'])) {
          
}else{
  header("location:$home");
}
require 'config/database.php';

$sqlCatalogo = "SELECT p.id, p.nombre, p.descripcion FROM catalogo AS p";
$catalogo = $conn->query($sqlCatalogo);

$dir = "posters/";

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Modal</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <div class="container py-3">

        <h2 class="text-center">Productos</h2>

        <hr>

        <?php if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
            <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
            unset($_SESSION['color']);
            unset($_SESSION['msg']);
        } ?>

      

        <div class="row justify-content-between">
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i
                        class="fa-solid fa-circle-plus"></i> Nuevo registro</a>
            </div>
            <div class="col-auto">
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cerrarSesionModal"><i
                        class="fa-solid fa-circle-xmark"></i> Cerrar Sesion</a>
            </div>
            
        </div>

        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th width="45%">Descripción</th>
                    <th>Poster</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $catalogo->fetch_assoc()) {


                    if (is_dir($dir)) {
                        if ($dh = opendir($dir)) {
                            while (($file = readdir($dh)) !== false) {

                                if ($file == $row['id'] . '.jpg') {
                                    $retorna_ext = pathinfo($file, PATHINFO_EXTENSION);

                                } elseif ($file == $row['id'] . '.png') {
                                    $retorna_ext = pathinfo($file, PATHINFO_EXTENSION);

                                }
                            }
                            closedir($dh);
                        }
                    }

                    ?>
                    <tr>
                        <td>
                            <?= $row['id']; ?>
                        </td>
                        <td>
                            <?= $row['nombre']; ?>
                        </td>
                        <td>
                            <?= $row['descripcion']; ?>
                        </td>

                        <td><img src="<?= $dir . $row['id'] . '.' . $retorna_ext . '?n=' . time(); ?>" width="150" height="150">
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editaModal"
                                data-bs-id="<?= $row['id']; ?>" data-bs-ext="<?= $retorna_ext; ?>"><i
                                    class="fa-solid fa-pen-to-square"></i> Editar</a>

                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal"
                                data-bs-id="<?= $row['id']; ?>" data-bs-ext="<?= $retorna_ext; ?>"><i
                                    class="fa-solid fa-trash"></i></i> Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include 'nuevoModal.php'; ?>
    <?php include 'editaModal.php'; ?>
    <?php include 'eliminaModal.php'; ?>
    <?php include 'cerrarSesionModal.php'; ?>

    <script>
        let nuevoModal = document.getElementById('nuevoModal')
        let editaModal = document.getElementById('editaModal')
        let eliminaModal = document.getElementById('eliminaModal')

        nuevoModal.addEventListener('shown.bs.modal', event => {
            nuevoModal.querySelector('.modal-body #nombre').focus()
        })

        nuevoModal.addEventListener('hide.bs.modal', event => {
            nuevoModal.querySelector('.modal-body #nombre').value = ""
            nuevoModal.querySelector('.modal-body #descripcion').value = ""

            nuevoModal.querySelector('.modal-body #poster').value = ""
        })

        editaModal.addEventListener('hide.bs.modal', event => {
            editaModal.querySelector('.modal-body #nombre').value = ""
            editaModal.querySelector('.modal-body #descripcion').value = ""

            editaModal.querySelector('.modal-body #img_poster').value = ""
            editaModal.querySelector('.modal-body #poster').value = ""
        })

        editaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let ext = button.getAttribute('data-bs-ext')

            let inputId = editaModal.querySelector('.modal-body #id')
            let inputNombre = editaModal.querySelector('.modal-body #nombre')
            let inputDescripcion = editaModal.querySelector('.modal-body #descripcion')

            let poster = editaModal.querySelector('.modal-body #img_poster')

            let url = "getCatalogo.php"
            let formData = new FormData()
            formData.append('id', id)

            fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
                .then(data => {

                    inputId.value = data.id
                    inputNombre.value = data.nombre
                    inputDescripcion.value = data.descripcion

                    poster.src = '<?= $dir ?>' + data.id + '.' + ext

                }).catch(err => console.log(err))

        })

        eliminaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let ext = button.getAttribute('data-bs-ext')
            eliminaModal.querySelector('.modal-footer #id').value = id
            eliminaModal.querySelector('.modal-footer #ext').value = ext

        })
    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>