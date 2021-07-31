<?php
function enviar(): array
{
    
        $nombre = $_POST['nombre'];
        try {
            $tiene_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);
            if ($tiene_imagen) {
                $temp = explode(".", $_FILES["imagen"]["name"]);
                $nueva_imagen = round(microtime(true)) . '.' . end($temp);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/categories/" . $nueva_imagen);
            } else {
                $nueva_imagen = "fondo.png";
            }
            require '../../../conexion.php';
            $stmt = $conn->prepare("INSERT INTO categorias (nombre, foto)
            VALUES (?,?)");

            $stmt->bind_param('ss', $nombre, $nueva_imagen);
            $stmt->execute();
            $stmt->close();
            $respuesta = array(
                'estado' => $tiene_imagen,
                'imagen' => $nueva_imagen,
            );

            return $respuesta;
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            return $respuesta;
        }
    
    return $respuesta;
}

function mostrar_usuarios(): array
{
        $sql = "SELECT id_usuario,nombres,apellidos,correo,usuario,estado FROM usuarios  ORDER BY usuarios.id_usuario ASC";
    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        //$stmt->bind_param('s', $usuario);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($id,$nombre, $apellido, $correo, $usuario,$estado);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['id'] = $id;
            $respuesta[$i]['nombre'] = $nombre;
            $respuesta[$i]['apellido'] = $apellido;
            $respuesta[$i]['correo'] = $correo;
            $respuesta[$i]['nombre_usuario'] = $usuario;
            $respuesta[$i]['estado'] = $estado;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}

function cambiar_estado_usuario(): array
{
    $cuenta_existente = false;
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { 
        $cuenta_existente = true;
    }
    if ($cuenta_existente) {
        $estado = (int) $_POST['estado'];
        $usuario = $_POST['id_usuario'];
        try {
            require '../../../conexion.php';
            $sql = "UPDATE usuarios SET estado = $estado WHERE usuarios.id_usuario = $usuario";
            mysqli_query($conn, $sql);
            $respuesta = array(
                'respuesta' => "ok",
            );
            
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
        }
    }
    return $respuesta;
}

?>