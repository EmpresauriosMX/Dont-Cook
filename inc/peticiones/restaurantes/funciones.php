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
    case "obtener_horarios":
        $resultado = obtener_horarios();
        break;
    case "ver_promo":
        $resultado = ver_promocion();
        break;
    case 'obtener_menu':
        $resultado = obtener_menu();
        break;
    case 'obtener_horario_restaurante_especifico':
        $resultado = obtener_horario_restaurante_especifico();
        break;
    case 'obtener_categorias_restaurante_especifico':
        $resultado = obtener_categorias_restaurante_especifico();
        break;
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide