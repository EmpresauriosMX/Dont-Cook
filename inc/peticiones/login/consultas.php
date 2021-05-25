<?php

function nuevo_usuario(): array
{
    $opciones =array('cost' => 12);

    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $usuario =$_POST['usuario'];
    $contra =$_POST['contrasenia1'];
    $type_user = 2;

    $hash_password  =password_hash($contra,PASSWORD_BCRYPT,$opciones);

    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare("INSERT INTO usuarios (nombres, apellidos, correo, usuario, contraseña, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssi', $nombre, $apellido, $correo, $usuario,$hash_password,$type_user);
        $stmt -> execute();

        $respuesta = array(
            'respuesta' =>  $stmt ->affected_rows,
            'nombre' => $nombre,
            'apellido'=> $apellido,
            'correo' => $correo,
            'tipo' => $type_user,
            'user' => $usuario,
            'pass' => $contra,
            'pass_hast' => $hash_password
        );

       $stmt->close();
        return $respuesta;

    } catch (\Throwable $th) {
        $respuesta = array(
            'respuesta' => $th
        );
        return $respuesta;
    }
}