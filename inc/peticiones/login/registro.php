<?php
function registrar_usuario(): array
{           //recibe los datos correctamente
    try {
        require '../../../conexion.php';

        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        //$telefono = $_POST['telefono'];
        $correo =  $_POST['correo'];
        $usuario = $_POST['usuario'];
        $contrasenia1 = $_POST['contrasenia1'];
        $contrasenia2 = $_POST['contrasenia2'];
        

        //COMPROBACIÓN DE USUARIOS REPETIDOS
        $sql = "SELECT * FROM `usuarios`;";
        $consulta = mysqli_query($conexion, $sql);
        $usuarios = [];
        $usuario_repetido = false;
        while ($row = mysqli_fetch_assoc($consulta)) { //usar cuando se espera varios resultadosS
            if($usuario ==  $row['usuario']){{
                $usuario_repetido = true;
            }}
        }
        
        if(!$usuario_repetido){
            $sql =  "INSERT INTO `usuarios`( `nombres`, `apellidos`, `telefono`, `correo`, `usuario`, `contrasenia`, `fotografia`, `estado`)
            VALUES ('$nombres','$apellidos','$telefono','$correo','$usuario','$contrasenia','1.jpg',0)";
            $consulta = mysqli_query($conexion, $sql);
            
        }

        $respuesta = array(
            'mensaje' => $mensaje,
            'repetido' => $usuario_repetido,
            'ruta' => $ruta_guardar_archivo,
            'tipo' => $tipo,
            'nombre_imagen' => $nombre_imagen
        );
        return $respuesta;

    } catch (\Throwable $th) {
        var_dump($th);
    }
    mysqli_close($conexion);
}
