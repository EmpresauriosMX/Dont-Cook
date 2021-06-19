<?php

function obtener_restaurantes(): array
{
    $ciudad = $_POST['ciudad'];
    if (isset($ciudad)) {
        $sql = "SELECT nombre,descripcion_corta,horario,ciudad,foto FROM restaurantes WHERE ciudad = '$ciudad'";
    }else {
        $sql = "SELECT nombre,descripcion_corta,horario,ciudad,foto FROM restaurantes";
    }
    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        //$stmt->bind_param('s', $usuario);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($nombre, $descripcion, $horario, $lugar,$imagen);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['nombre'] = $nombre;
            $respuesta[$i]['lugar'] = $lugar;
            $respuesta[$i]['horario'] = $horario;
            $respuesta[$i]['descripcion'] = $descripcion;
            $respuesta[$i]['imagen'] = $imagen;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}

function res_especifico(): array
{
    $ciudad = $_POST['ciudad'];
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { //si la variable de sesión está vacia entonces se redirige al login
        $cuenta_existente = true;
    }
    //SE VALIDA DE QUE TENGA UNA CUENTA EXISTENTE
    if ($cuenta_existente) {
        $id_restaurante = $_POST['id'];
        try {
            require '../../../conexion.php';
            $sql = "SELECT * FROM `restaurantes` WHERE `ciudad` = $ciudad and `id_restaurante` = $id_restaurante";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            //SI CUENTA CON RESTAURANTES
            if (mysqli_num_rows($consulta) != 0) {
                $row = mysqli_fetch_assoc($consulta);
                $respuesta = array(
                    'id'        => $row['id_restaurante'],
                    'nombre'    => $row['nombre'],
                    'telefono'  => $row['telefono'],
                    'descripcion' => $row['descripcion_corta'],
                    'descripcion_larga' => $row['des_larga'],
                    'horario'   => $row['horario'],
                    'correo'    => $row['correo'],
                    'facebook' => $row['fb'],
                    'instagram' => $row['inst'],
                    'cp'        => $row['codigo_postal'],
                    'direccion' => $row['direccion'],
                    'ciudad'    => $row['ciudad'],
                    'foto'      => $row['foto']
                );
            } else {
                //SI NO CUENTA CON RESTAURANTES
                $respuesta = array(
                    'respuesta' => "sin_restaurantes",
                    'consulta' => mysqli_num_rows($consulta)
                );
            }
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => "entro al catch "
            );
        }
    }
    return $respuesta;



}
