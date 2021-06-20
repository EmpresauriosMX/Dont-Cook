<?php
$accion = $_POST['accion'];
require 'consultas.php';

switch ($accion) {
    case "obtener_estado":
        $resultado = getEstado();
        break;
    case 'obtener_municipio':
        $resultado = getMunicipio();
        break;
    case 'obtener_localidad':
        $resultado = getLocalidad();
        break;
    case 'busca_categorias':
        $resultado = busca_categorias();
        break;
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide