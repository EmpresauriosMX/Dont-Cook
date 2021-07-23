<?php

function obtener_restaurantes(): array
{
    $ciudad = $_POST['ciudad'];
    if (isset($ciudad)) {
        $sql = "SELECT id_restaurante,nombre,descripcion_corta,horario,ciudad,foto,correo,fb,inst FROM restaurantes WHERE ciudad = '$ciudad'";
    }else {
        $sql = "SELECT id_restaurante,nombre,descripcion_corta,horario,ciudad,foto,correo,fb,inst FROM restaurantes";
    }
    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        //$stmt->bind_param('s', $usuario);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($id,$nombre, $descripcion, $horario, $lugar,$imagen,$correo, $fb, $insta);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['id'] = $id;
            $respuesta[$i]['nombre'] = $nombre;
            $respuesta[$i]['lugar'] = $lugar;
            $respuesta[$i]['horario'] = $horario;
            $respuesta[$i]['descripcion'] = $descripcion;
            $respuesta[$i]['imagen'] = $imagen;
            $respuesta[$i]['correo'] = $correo;
            $respuesta[$i]['fb'] = $fb;
            $respuesta[$i]['insta'] = $insta;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}


function obtener_restaurantes_categoria(): array
{
    $ciudad = $_POST['ciudad'];
    $categoria = $_POST['categoria'];
        try {
            require '../../../conexion.php';
            $sql = "SELECT `restaurantes`.`id_restaurante`, `restaurantes`.`nombre`, 
                `restaurantes`.`telefono`, `restaurantes`.`foto`, `restaurantes`.`descripcion_corta`,
                `restaurantes`.`horario`, `restaurantes`.`ciudad`, `categorias`.`id_categoria`, 
                `categorias`.`nombre` as `nombre_categoria` FROM `categorias_restaurantes`, `categorias`, `restaurantes`
                WHERE `categorias_restaurantes`.`id_categoria` = `categorias`.`id_categoria` and 
                `restaurantes`.`id_restaurante` = `categorias_restaurantes`.`id_restaurante` and 
                `categorias`.`nombre` = '$categoria' and `restaurantes`.`ciudad` = '$ciudad'";
                $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            $i = 0;
            //SI CUENTA CON RESTAURANTES
            if (mysqli_num_rows($consulta) != 0) {
                while ($row = mysqli_fetch_assoc($consulta)) {
                    $respuesta[$i]['id'] = $row['id_restaurante'];
                    $respuesta[$i]['id_categoria'] = $row['id_categoria'];
                    $respuesta[$i]['nombre'] = $row['nombre'];
                    $respuesta[$i]['telefono'] = $row['telefono'];
                    $respuesta[$i]['descripcion'] = $row['descripcion_corta'];
                    $respuesta[$i]['imagen'] = $row['foto'];
                    $i++;
                }
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
    return $respuesta;
}

/*
function obtener_restaurantes_categoria(): array
{
    $ciudad = $_POST['ciudad'];
    $categoria = $_POST['categoria'];
    if (isset($ciudad)) {
        $sql = "SELECT `restaurantes`.`id_restaurante`, `restaurantes`.`nombre`, 
                `restaurantes`.`telefono`, `restaurantes`.`foto`, `restaurantes`.`descripcion_corta`,
                `restaurantes`.`horario`, `restaurantes`.`ciudad`, 
                `categorias_restaurantes`.`id_categorias_restaurantes`, `categorias`.`id_categoria`, 
                `categorias`.`nombre` FROM `categorias_restaurantes`, `categorias`, `restaurantes`
                WHERE `categorias_restaurantes`.`id_categoria` = `categorias`.`id_categoria` and 
                `restaurantes`.`id_restaurante` = `categorias_restaurantes`.`id_restaurante` and 
                `categorias`.`nombre` = '$categoria' and `restaurantes`.`ciudad` = '$ciudad'";
    }else {
        $sql = "SELECT id_restaurante,nombre,descripcion_corta,horario,ciudad,foto FROM restaurantes";
    }
    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        //$stmt->bind_param('s', $usuario);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($id,$nombre, $descripcion, $horario, $lugar,$imagen);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['id_restaurante'] = $id;
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
*/

// informacion de un solo restaurante
function res_especifico(): array
{
    $id_restaurante = $_POST['id'];
        try {
            require '../../../conexion.php';
            $sql = "SELECT * FROM `restaurantes` WHERE `id_restaurante` = $id_restaurante";
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
    return $respuesta;

}
function obtener_horarios(): array
{
    $ciudad = $_POST['ciudad'];
    $dia = (int) $_POST['dia'];

    $sql = "SELECT restaurantes.id_restaurante,restaurantes.serv_dom,fechas.dia,fechas.hora_inicio,fechas.hora_fin
     FROM restaurantes,fechas WHERE fechas.id_restaurante = restaurantes.id_restaurante
      AND fechas.dia = $dia AND restaurantes.ciudad ='$ciudad' ";

    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $dia, $ciudad);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($id, $servicio_domicilio, $dia_registrado, $apertura, $cierre);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['id'] = $id;
            $respuesta[$i]['servicio_domicilio'] = $servicio_domicilio;
            $respuesta[$i]['dia_registro'] = $dia_registrado;
            $respuesta[$i]['apertura'] = $apertura;
            $respuesta[$i]['cierre'] = $cierre;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }


    return $respuesta;
}

function ver_promocion(): array
{
    $id_restaurante = $_POST['id'];
    try {
        require '../../../conexion.php';
        $sql = "SELECT * FROM `promociones` WHERE `id_restaurante` = $id_restaurante";
        $consulta = mysqli_query($conn, $sql);
        $respuesta = [];
        $i = 0;
        //SI CUENTA CON RESTAURANTES
        if (mysqli_num_rows($consulta) != 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                $respuesta[$i]['descripcion'] = $row['descripcion'];
                $respuesta[$i]['Dias'] = $row['Dias'];
                $respuesta[$i]['Nombre'] = $row['Nombre'];
                $respuesta[$i]['fecha'] = $row['fecha'];
                $respuesta[$i]['fecha_f'] = $row['fecha_f'];
                $respuesta[$i]['horario'] = $row['horario'];
                $respuesta[$i]['imagen'] = $row['imagen'];
                $i++;
            }
        }
        return $respuesta;
    } catch (\Throwable $th) {
        //throw $th;
    }
}


function obtener_menu(): array
{
    $id_restaurante = $_POST['id'];
    try {
        require '../../../conexion.php';
        $sql = "SELECT * FROM `menus` WHERE `id_restaurante` = $id_restaurante";
        $consulta = mysqli_query($conn, $sql);
        $respuesta = [];
        $i = 0;
        //SI CUENTA CON RESTAURANTES
        if (mysqli_num_rows($consulta) != 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                $respuesta[$i]['descripcion'] = $row['descripcion'];
                $respuesta[$i]['imagen'] = $row['imagen'];
                $i++;
            }
        }
        return $respuesta;
    } catch (\Throwable $th) {
        //throw $th;
    }
}

function obtener_horario_restaurante_especifico(): array
{
    $id_restaurante = $_POST['id'];
    try {
        require '../../../conexion.php';
        $sql = "SELECT * FROM `fechas` WHERE `id_restaurante` = $id_restaurante";
        $consulta = mysqli_query($conn, $sql);
        $respuesta = [];
        $i = 0;
        //SI CUENTA CON RESTAURANTES
        if (mysqli_num_rows($consulta) != 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                $respuesta[$i]['dia'] = $row['dia'];
                $respuesta[$i]['hora_inicio'] = $row['hora_inicio'];
                $respuesta[$i]['hora_fin'] = $row['hora_fin'];
                $i++;
            }
        }
        return $respuesta;
    } catch (\Throwable $th) {
        //throw $th;
    }
}

function obtener_categorias_restaurante_especifico(): array
{
    $id_restaurante = $_POST['id'];
    try {
        require '../../../conexion.php';
        $sql = "SELECT categorias.nombre FROM `categorias_restaurantes`,`categorias` WHERE categorias_restaurantes.id_categoria = categorias.id_categoria AND categorias_restaurantes.id_restaurante = $id_restaurante";
        $consulta = mysqli_query($conn, $sql);
        $respuesta = [];
        $i = 0;
        //SI CUENTA CON RESTAURANTES
        if (mysqli_num_rows($consulta) != 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                $respuesta[$i]['nombre'] = $row['nombre'];
                $i++;
            }
        }
        return $respuesta;
    } catch (\Throwable $th) {
        //throw $th;
    }
}


