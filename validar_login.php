<?php

session_start();
require 'rutas.php';
require 'config/database.php';
$usuario=$conn->real_escape_string($_POST['usuario']);
$contraseña=$conn->real_escape_string($_POST['contraseña']);
$_SESSION['usuario'] = $usuario;

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and pass = '$contraseña'";
$resultado = mysqli_query($conn,$sql);
$filas = mysqli_num_rows($resultado);

$codigo_administrador = false;
if($filas){
    //Si se desea cambiar el tiempo de logeo tener en cuenta que 3600 estan en segundos
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


