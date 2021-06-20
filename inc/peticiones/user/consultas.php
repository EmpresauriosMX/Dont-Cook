<?php
function user_data(): array{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { //si la variable de sesión está vacia entonces se redirige al login
        $cuenta_existente = true;
        try {
            require '../../../conexion.php';
            $sql = "SELECT * FROM `usuarios` WHERE `id_usuario` = $id_user";
            $consulta = mysqli_query($conn, $sql);
            $user = [];
            $i = 0;
            $row = mysqli_fetch_assoc($consulta);
                $user['nombres'] = $row['nombres'];
                $user['apellidos'] = $row['apellidos'];
                $user['correo'] = $row['correo'];
                $user['edad'] = $row['edad'];
                $user['fotografia'] = $row['fotografia'];
                $user['usuario'] = $row['usuario'];
        } catch (\Throwable $th) {
            $user = array(
                'respuesta' => "entro al catch"
            );
        }
    }
    return $user;
}
