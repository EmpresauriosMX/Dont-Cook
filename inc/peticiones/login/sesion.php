<?php 
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id_user'];
    if($id_user == ""){ //si la variable de sesión está vacia entonces se redirige al login
        header("location: ../../../index.html");
    }
?>