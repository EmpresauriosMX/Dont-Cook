<?php


function sendDatos():array{

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

/*
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
}*/

?>