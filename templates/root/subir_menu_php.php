<?php


function obtener_restaurantes(): array
{
    $texto = $_POST['texto'];
    try {
        require '../../conexion.php';
        $ingresar_horario = $conn->prepare("INSERT INTO menus (descripcion) VALUES (?)");
        $ingresar_horario->bind_param('s', $texto);
        $ingresar_horario->execute();

    } catch (\Throwable $th) {
    }
    $respuesta = array (
        'recibo' => $texto,
        'si' => "hola"
    );
    return $respuesta;
}
echo json_encode(obtener_restaurantes());
?>