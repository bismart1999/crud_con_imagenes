<?php

session_start();
require 'rutas.php';
require 'config/database.php';

$nombre = $conn->real_escape_string($_POST['nombre']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$sql = "INSERT INTO catalogo (nombre, descripcion, fecha_alta) VALUES ('$nombre', '$descripcion', NOW())";
if ($conn->query($sql)) {
    $id = $conn->insert_id;

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro guardado";

    if ($_FILES['poster']['error'] == UPLOAD_ERR_OK) {

        //si se desea agregar mas tipos de extensiones, modificar la variable $permitidos
        $permitidos = array("image/jpeg", "image/jpeg", "image/png", "image/webp");
        if (in_array($_FILES['poster']['type'], $permitidos)) {

            $dir = "posters";
            
            $info_img = pathinfo($_FILES['poster']['name']);
            $info_img['extension'];

            $poster = $dir . '/' . $id . '.' . $info_img['extension'];

            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            if (!move_uploaded_file($_FILES['poster']['tmp_name'], $poster)) {
                $_SESSION['color'] = "danger";
                $_SESSION['msg'] .= "<br>Error al guardar imagen";
            }
        } else {
            $_SESSION['color'] = "danger";
            $_SESSION['msg'] .= "<br>Formato de imágen no permitido";
        }
    }
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al guarda imágen";
}

header("Location: $administrador");