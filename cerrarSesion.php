<?php
require 'rutas.php';
    $codigo_administrador = true;
    setcookie("logeo", $codigo_administrador, time()-3600,"/","");
             // $_SESSION['sesion_login']=$_usuario;
             header("location:$home");
