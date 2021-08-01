<?php
$accion = $_POST['accion'];
require 'consultas.php';

switch ($accion) {
    case "registrar_categoria":
        $resultado = enviar();
        break;
    case "mostrar_usuarios":
        $resultado = mostrar_usuarios();
        break;
    case "cambiar_estado_usuario":
        $resultado = cambiar_estado_usuario();
        break;
    case "mostrar_restaurantes_pendientes":
        $resultado = mostrar_restaurantes_pendientes();
        break;
    case "cambiar_estado_restaurante":
        $resultado = cambiar_estado_restaurante();
        break;
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide