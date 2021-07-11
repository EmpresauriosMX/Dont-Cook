<?php
$accion = $_POST['accion'];
require 'consultas.php';

switch ($accion) {
    case "registrar_restaurante":
        $resultado = enviar();
        break;
    case "verifica_cuenta":
        $resultado = verifica_cuenta();
        break;
    case "busca_restaurantes":
        $resultado = busca_restaurantes();
        break;
    case "info_restaurantes":
        $resultado = info_restaurante();
        break;
    case "agregar_promo":
        $resultado = agregar_promocion();
        break;
    case "ver_promo":
        $resultado = ver_promocion();
        break;
    case "obtener_categorias":
        $resultado = obtener_categorias();
        break;
    case "horario_restaurante":
        $resultado = horario_restaurante();
        break;
    case 'subir_menu':
        $resultado = subir_menu();
        break;
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide