<?php
$accion = $_POST['accion'];
require 'consultas.php';

switch ($accion) {
    case "registrar":
        $resultado = nuevo_usuario();
        break;
    case "ingresar":
$resultado = buscar_usuario();
        break;
}

echo json_encode($resultado);
