<?php

function obtener_promociones_todos(): array
{
    $ciudad = $_POST['ciudad'];

    $sql = "SELECT restaurantes.nombre,promociones.id_promocion,promociones.id_restaurante,promociones.imagen,
    promociones.descripcion,promociones.Nombre,  promociones.fecha,promociones.fecha_f,promociones.horario,promociones.lunes,
    promociones.martes,promociones.miercoles,promociones.jueves,promociones.viernes,promociones.sabado,promociones.domingo
     FROM restaurantes,promociones WHERE restaurantes.id_restaurante = promociones.id_restaurante and restaurantes.ciudad = '$ciudad'";
    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $ciudad);
        $stmt->execute();
        $stmt->bind_result($nombre_res,$id, $id_restaurante, $imagen, $descripcion, $nombre, $fecha_inicio, $fecha_final, $horario,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['nombre_res'] =$nombre_res;
            $respuesta[$i]['id_promocion'] = $id;
            $respuesta[$i]['id_restaurante'] = $id_restaurante;
            $respuesta[$i]['imagen'] = $imagen;
            $respuesta[$i]['descripcion'] = $descripcion;
            $respuesta[$i]['Nombre'] = $nombre;
            $respuesta[$i]['fecha'] = $fecha_inicio;
            $respuesta[$i]['fecha_f'] = $fecha_final;
            $respuesta[$i]['horario'] = $horario;
            $respuesta[$i]['lunes'] = $lunes ;
            $respuesta[$i]['martes'] = $martes ;
            $respuesta[$i]['miercoles'] = $miercoles ;
            $respuesta[$i]['jueves'] = $jueves ;
            $respuesta[$i]['viernes'] = $viernes ;
            $respuesta[$i]['sabado'] = $sabado ;
            $respuesta[$i]['domingo'] = $domingo ;
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

    //las variables sera el nombre de la ciudad : $ciudad 
    // y el tipo de promocion promociones.$dia = 1
    $sql = "SELECT restaurantes.nombre,promociones.id_promocion,promociones.id_restaurante,promociones.imagen,
    promociones.descripcion,promociones.Nombre,  promociones.fecha,promociones.fecha_f,promociones.horario,promociones.lunes,
    promociones.martes,promociones.miercoles,promociones.jueves,promociones.viernes,promociones.sabado,promociones.domingo
     FROM restaurantes,promociones WHERE restaurantes.id_restaurante = promociones.id_restaurante and restaurantes.ciudad = '$ciudad' AND promociones.$dia = 1";
    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $ciudad, $dia);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($nombre_res,$id, $id_restaurante, $imagen, $descripcion, $nombre, $fecha_inicio, $fecha_final, $horario,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo);

        $respuesta = [];
        $i = 0;
        if (mysqli_num_rows($consulta) != 0) {
            while ($stmt->fetch()) {
                $respuesta[$i]['nombre_res'] =$nombre_res;
                $respuesta[$i]['id_promocion'] = $id;
                $respuesta[$i]['id_restaurante'] = $id_restaurante;
                $respuesta[$i]['imagen'] = $imagen;
                $respuesta[$i]['descripcion'] = $descripcion;
                $respuesta[$i]['Nombre'] = $nombre;
                $respuesta[$i]['fecha'] = $fecha_inicio;
                $respuesta[$i]['fecha_f'] = $fecha_final;
                $respuesta[$i]['horario'] = $horario;
                $respuesta[$i]['lunes'] = $lunes ;
                $respuesta[$i]['martes'] = $martes ;
                $respuesta[$i]['miercoles'] = $miercoles ;
                $respuesta[$i]['jueves'] = $jueves ;
                $respuesta[$i]['viernes'] = $viernes ;
                $respuesta[$i]['sabado'] = $sabado ;
                $respuesta[$i]['domingo'] = $domingo ;
                $i++;
            }
        } else {
            //SI NO CUENTA CON RESTAURANTES
            $respuesta = array(
                'respuesta' => "sin_promos"
            );
        }
        
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}

