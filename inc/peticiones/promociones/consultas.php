<?php

function obtener_promociones_todos(): array
{
    $ciudad = $_POST['ciudad'];

    $sql = "SELECT restaurantes.nombre,promociones.id_promocion,promociones.id_restaurante,promociones.imagen,promociones.descripcion,promociones.Dias,promociones.Nombre, promociones.fecha,promociones.fecha_f,promociones.horario FROM restaurantes,promociones WHERE restaurantes.id_restaurante = promociones.id_restaurante and restaurantes.ciudad ='$ciudad' ";

    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $ciudad);
        $stmt->execute();
        $stmt->bind_result($nombre_res,$id, $id_restaurante, $imagen, $descripcion, $dias, $nombre, $fecha_inicio, $fecha_final, $horario);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['nombre_res'] =$nombre_res;
            $respuesta[$i]['id_promocion'] = $id;
            $respuesta[$i]['id_restaurante'] = $id_restaurante;
            $respuesta[$i]['imagen'] = $imagen;
            $respuesta[$i]['descripcion'] = $descripcion;
            $respuesta[$i]['Dias'] = $dias;
            $respuesta[$i]['Nombre'] = $nombre;
            $respuesta[$i]['fecha'] = $fecha_inicio;
            $respuesta[$i]['fecha_f'] = $fecha_final;
            $respuesta[$i]['horario'] = $horario;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}

function obtener_promocion_dia(): array
{
    $ciudad = $_POST['ciudad'];
    $dia =  $_POST['dia'];

    $sql = "SELECT restaurantes.nombre,promociones.id_promocion,promociones.id_restaurante,promociones.imagen,promociones.descripcion,promociones.Dias,promociones.Nombre,
    promociones.fecha,promociones.fecha_f,promociones.horario FROM restaurantes,promociones WHERE restaurantes.id_restaurante = promociones.id_restaurante and restaurantes.ciudad = '$ciudad' AND promociones.Dias LIKE '%$dia%'";

    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $ciudad, $dia);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($nombre_res,$id, $id_restaurante, $imagen, $descripcion, $dias, $nombre, $fecha_inicio, $fecha_final, $horario);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['nombre_res'] =$nombre_res;
            $respuesta[$i]['id_promocion'] = $id;
            $respuesta[$i]['id_restaurante'] = $id_restaurante;
            $respuesta[$i]['imagen'] = $imagen;
            $respuesta[$i]['descripcion'] = $descripcion;
            $respuesta[$i]['Dias'] = $dias;
            $respuesta[$i]['Nombre'] = $nombre;
            $respuesta[$i]['fecha'] = $fecha_inicio;
            $respuesta[$i]['fecha_f'] = $fecha_final;
            $respuesta[$i]['horario'] = $horario;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}

