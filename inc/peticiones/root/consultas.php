<?php
function enviar(): array
{
    
        $nombre = $_POST['nombre'];
        try {
            $tiene_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);
            if ($tiene_imagen) {
                $temp = explode(".", $_FILES["imagen"]["name"]);
                $nueva_imagen = round(microtime(true)) . '.' . end($temp);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/categories/" . $nueva_imagen);
            } else {
                $nueva_imagen = "fondo.png";
            }
            require '../../../conexion.php';
            $stmt = $conn->prepare("INSERT INTO categorias (nombre, foto)
            VALUES (?,?)");

            $stmt->bind_param('ss', $nombre, $nueva_imagen);
            $stmt->execute();
            $stmt->close();
            $respuesta = array(
                'estado' => $tiene_imagen,
                'imagen' => $nueva_imagen,
            );

            return $respuesta;
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            return $respuesta;
        }
    
    return $respuesta;
}

?>