<?php
$accion = $_POST['accion'];
require 'consultas.php';

switch ($accion) {
    case "registrar_restaurante":
        $resultado = enviar();
        break;
    case "restaurantes_home":
        $resultado = restaurantes_home();
        break;
        
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide