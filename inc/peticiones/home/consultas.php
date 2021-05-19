<?php
function getEstado(): array
{
    try {
        require '../../../conexion.php';
        $query = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
        $resultado = mysqli_query($conn, $query);
        $estados = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($resultado)) {
            $estados[$i]['id'] = $row['id_estado'];
            $estados[$i]['nombre'] = $row['estado'];
            $i++;
        }
        //var_dump($estados);
        return $estados;
    } catch (\Throwable $th) {
        var_dump($th);
    }
    mysqli_close($conn);
}

function getMunicipio(): array
{
    try {
        require('../../../conexion.php');
        $id_estado = $_POST['id_estado'];

        $sql = "SELECT id_municipio, municipio FROM t_municipio WHERE id_estado = $id_estado ORDER BY municipio";
        $consulta = mysqli_query($conn, $sql);

        $municipios = [];
        $i = 0;

        while ($row = mysqli_fetch_assoc($consulta)) {
            $municipios[$i]['id'] = $row['id_municipio'];
            $municipios[$i]['nombre'] = $row['municipio'];
            $i++;
        }

        return $municipios;
    } catch (\Throwable $th) {
        var_dump($th);
    }
    mysqli_close($conn);
}

function getLocalidad(): array
{
    try {
        require '../../../conexion.php';
        $id_municipio = $_POST['id_municipio'];

        $sql = "SELECT id_localidad, localidad FROM t_localidad WHERE id_municipio = '$id_municipio' ORDER BY localidad";
        $consulta = mysqli_query($conn, $sql);

        $localidades = [];
        $i = 0;


        while ($row = mysqli_fetch_assoc($consulta)) {
            $localidades[$i]['id'] = $row['id_localidad'];
            $localidades[$i]['nombre'] = $row['localidad'];
            $i++;
        }
        return $localidades;
    } catch (\Throwable $th) {
        var_dump($th);
    }
    mysqli_close($conn);
}
