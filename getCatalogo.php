<?php

require 'config/database.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT id, nombre, descripcion FROM catalogo WHERE id=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$catalogo = [];

if ($rows > 0) {
    $catalogo = $resultado->fetch_array();
}

echo json_encode($catalogo, JSON_UNESCAPED_UNICODE);
