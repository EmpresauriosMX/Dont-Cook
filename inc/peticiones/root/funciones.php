<?php
$accion = $_POST['accion'];
require 'consultas.php';

switch ($accion) {
    case "registrar_categoria":
        $resultado = enviar();
        break;
        
}


echo json_encode(($resultado)/*, JSON_UNESCAPED_UNICODE*/);// envio el retorno del array a donde se me pide