<?php
function getEstado(): array
{
    try {
        require '../../../conexion.php';
        $hola = "hola";
        //var_dump($estados);
        return $hola;
    } catch (\Throwable $th) {
        var_dump($th);
    }
    mysqli_close($conn);
}
