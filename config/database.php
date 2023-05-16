<?php
//configuracion de la base de datos
$conn = new mysqli("127.0.0.1", "root", "", "db_proyecto");

if ($conn->connect_error) {
    die("Error de conexión" . $conn->connect_error);
}
