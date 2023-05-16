<?php

session_start();

require 'rutas.php';
require 'config/database.php';
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root","","db_proyecto");
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and pass = '$contraseña'";

$resultado = mysqli_query($conn,$sql);

$filas = mysqli_num_rows($resultado);

$codigo_administrador = false;
if($filas){
    
    $codigo_administrador = true;
    setcookie("logeo", $codigo_administrador, time()+3600,"/","");
 	    // $_SESSION['sesion_login']=$_usuario;
 	    header("location:$administrador");
}else{
    ?>
    <?php
    include("login.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
    
}
mysqli_free_result($resultado);
mysqli_close($conn);


