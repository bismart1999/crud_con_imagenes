<?php

session_start();
require 'rutas.php';
require 'config/database.php';

$id = $conn->real_escape_string($_POST['id']);
$ext = $conn->real_escape_string($_POST['ext']);
$sql = "DELETE FROM catalogo WHERE id=$id";
if ($conn->query($sql)) {
    
    $dir = "posters";
    $poster = $dir . '/' . $id . '.' . $ext;
    

    if (file_exists($poster)) {
        unlink($poster);
    }

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro eliminado";
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al eliminar registro";
}

header("Location: $administrador");
