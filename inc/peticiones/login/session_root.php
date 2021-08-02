<?php 
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    if($tipo_usuario == 3 ){ //si la variable de sesión está vacia entonces se redirige al login
        header("location: ../../templates/login/login.php");
    }
?>