<?php

function nuevo_usuario(): array
{
    $opciones = array('cost' => 12);
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contra = $_POST['contrasenia1'];
    $type_user = 2;

    $hash_password  = password_hash($contra, PASSWORD_BCRYPT, $opciones);

    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare("INSERT INTO usuarios (nombres, apellidos, correo, usuario, contraseña, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssi', $nombre, $apellido, $correo, $usuario, $hash_password, $type_user);
        $stmt->execute();

        $respuesta = array(
            'respuesta' =>  $stmt->affected_rows,
            'nombre' => $nombre,
            'apellido' => $apellido,
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


function buscar_usuario(): array
{
    try {
        require '../../../conexion.php';
        $usuario = $_POST['user'];
        $contraseña_recibida = $_POST['password'];
        $stmt = $conn->prepare("SELECT id_usuario,correo,usuario,contraseña FROM usuarios WHERE usuario = ?");
        $stmt->bind_param('s', $usuario);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($id_usuario, $correo_usuario, $nombre_usuario, $contraseña_usuario);
        $stmt->fetch();

        if ($nombre_usuario) {
            if (password_verify($contraseña_recibida, $contraseña_usuario)) {
                session_start(); //datos de la session
                $_SESSION['nombre'] = $usuario;
                $_SESSION['id'] = $id_usuario;
                $_SESSION['login'] = true;

                $respuesta = array(
                    'respuesta' => 'correcto',
                    'id' => $id_usuario,
                    'nombre' => $nombre_usuario,
                    'corre0' => $correo_usuario,
                    'contra' => $contraseña_usuario,
                    'otra_contra' => $contraseña_recibida,
                    'usuarioooo' => $usuario
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'contraseña incorrecta'
                );
            }
        }else{
            $respuesta = array(
                'respuesta' => "no existe el usuario"
            );
        }


        return $respuesta;
    } catch (\Throwable $th) {
        //throw $th;
    }
}

function existente_usuario(): array
{
    try {
        require '../../../conexion.php';
        $usuario = $_POST['user'];
        $stmt = $conn->prepare("SELECT id_usuario,correo,usuario FROM usuarios WHERE usuario = ?");
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        // Loguear el usuario
        $stmt->bind_result($id_usuario, $correo_usuario, $nombre_usuario);
        $stmt->fetch();

        if ($nombre_usuario) {
          $enviar_mensaje = true;
        }else {
        $enviar_mensaje = false;
        }

        $respuesta = array (
            'respuesta' => $enviar_mensaje
        );


        return $respuesta;
    } catch (\Throwable $th) {
        //throw $th;
    }
}