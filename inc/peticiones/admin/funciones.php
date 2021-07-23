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
    case "ver_promo_especifico":
        $resultado = ver_promo_especifico();
        break;
    case "editar_promo":
        $resultado = editar_promo();
        break;
    case "obtener_categorias":
        $resultado = obtener_categorias();
        break;
    case "horario_restaurante":
        $resultado = horario_restaurante();
        break;
    case "actualiza_datos_generales":
        $resultado = actualiza_datos_generales();
        break;
    case "actualiza_datos_contacto":
        $resultado = actualiza_datos_contacto();
        break;
    case "actualiza_datos_ciudad":
        $resultado = actualiza_datos_ciudad();
        break;
    case "actualiza_datos_horario":
        $resultado = actualiza_datos_horario();
        break;
    case "actualiza_datos_categoria":
        $resultado = actualiza_datos_categoria();
        break;
    case 'subir_menu':
        $resultado = subir_menu();
        break;
    case 'actualizar_menu':
        $resultado = actualizar_menu();
        break;
    case 'mostrar_menu':
        $resultado = mostrar_menu();
        break;
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide