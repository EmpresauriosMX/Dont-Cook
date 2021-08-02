<?php 
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    if($id_user == ""){ //si la variable de sesión está vacia entonces se redirige al login
        header("location: ../../templates/login/login.php");
    }
    else{
        
    }
?>