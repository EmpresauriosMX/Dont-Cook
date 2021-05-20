<?php
    session_start();
    require 'db.php';

    $user = $_POST["user"];
    $pass = $_POST["pass"];
    echo 'hola';
    echo $user . ' ' . $pass;

    $result = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE `usuario` = '$user' and `contrasenia` = '$pass' and `estado` = 1 ");
    $total = mysqli_num_rows($result);                                      
    $row=mysqli_fetch_array($result);

    if($row["id_usuario"] != 0){
        //La sesión es el id del usuario que ingresó
        $_SESSION["id_user"] = $row["id_usuario"];
        header("location: ../../src/pages/home/home.php");
        //echo 'id '.$_SESSION["id_user"];
        //echo 'nombre '.$row["nombres"];
    }
    else{
        header("location: ../../index.html");
        //echo "datos incorrectos";
    }
    mysqli_close($conexion);
?>