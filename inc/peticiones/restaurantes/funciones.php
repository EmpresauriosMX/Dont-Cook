<?php
$accion = $_POST['accion'];
require 'consultas.php';

switch ($accion) {
    case "obtener_restaurantes":
        $resultado = obtener_restaurantes();
        break;
    case "obtener_restaurantes_categoria":
        $resultado = obtener_restaurantes_categoria();
        break;
    case "mostrar_restaurante":
        $resultado = res_especifico();
        break;
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide