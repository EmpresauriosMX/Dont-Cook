<?php
$accion = $_POST['accion'];
require 'consultas.php';

switch ($accion) {
    case "obtener_promociones_todos":
        $resultado = obtener_promociones_todos();
        break;
    case "obtener_promocion_dia":
        $resultado = obtener_promocion_dia();
        break;
}


echo json_encode(($resultado));