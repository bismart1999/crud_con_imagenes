<?php
require 'rutas.php';
    $codigo_administrador = true;
    //Para el cierre de seccion se le resta el mismo valor que se le asigno al crear la seccion
    setcookie("logeo", $codigo_administrador, time()-3600,"/","");
             // $_SESSION['sesion_login']=$_usuario;
             header("location:$home");
