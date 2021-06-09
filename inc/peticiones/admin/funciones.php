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
        
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide