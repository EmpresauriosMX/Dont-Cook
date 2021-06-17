<?php
function enviar(): array{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    //$cuenta_existente = $id_user ? 'true' : 'false';
    if($id_user != ""){ //si la variable de sesión está vacia entonces se redirige al login
        $cuenta_existente = true;
    }
    //SE VALIDA DE QUE TENGA UNA CUENTA EXISTENTE
    if($cuenta_existente){
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $des_corta = $_POST['desc_corta'];
        $des_larga = $_POST['desc_larga'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $cp = $_POST['cp'];
        $email = $_POST['email'];
        $horarios = $_POST['horarios'];

        $temp = explode(".", $_FILES["imagen"]["name"]);
        $nueva_imagen = round(microtime(true)) . '.' . end($temp);

        try {
            require '../../../conexion.php';
            $stmt = $conn->prepare("INSERT INTO restaurantes (id_propietario, nombre, telefono, descripcion_corta, des_larga, horario, correo, codigo_postal, direccion,ciudad,foto)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)");
            $resultado = move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/restaurantes/" . $nueva_imagen);
            if ($resultado) {
                $stmt->bind_param('sssssssssss', $id_user, $nombre, $telefono, $des_corta, $des_larga, $horarios, $email, $cp, $direccion, $ciudad, $nueva_imagen);
                $stmt->execute();
                $stmt->close();
                $respuesta = array(
                    'respuesta' => 'correcto',
                    'imagen' => $imagen
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                    'imagen' => $imagen
                );
            }
            return $respuesta;
        }
        catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            return $respuesta;
        }
    }
    return $respuesta;
}

function restaurantes_home(): array{

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $des_corta = $_POST['desc_corta'];
    $des_larga = $_POST['desc_larga'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $localidad = $_POST['ciudad'];
    $cp = $_POST['cp'];

    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare("INSERT INTO restaurantes (nombre, telefono, descripcion_corta, des_larga, codigo_postal, estado, municipio, localidad)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('ssssssss', $nombre, $telefono, $des_corta, $des_larga, $cp, $estado, $municipio, $localidad);
        $stmt -> execute();

        $respuesta = array(
            'nombre' => $nombre,
            'telefono'=> $telefono,
            'corta' => $des_corta,
            'larga' => $des_larga,
            'estado' => $estado,
            'municipio' => $municipio,
            'CP' => $cp,
            'localidad' => $localidad 
        );

        $stmt->close();
        return $respuesta;

    } catch (\Throwable $th) {
        $respuesta = array(
            'respuesta' => $th
        );
        return $respuesta;
    }

    

}

function verifica_cuenta(): array{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    //$cuenta_existente = $id_user ? 'true' : 'false';
    if($id_user != ""){ //si la variable de sesión está vacia entonces se redirige al login
        //header("location: ../../../index.html");
        $cuenta_existente = true;
    }

        $respuesta = array(
            'cuenta_existente' => $cuenta_existente,    
            'id_cuenta_activa' => $id_user
        );


        return $respuesta;
}

function busca_restaurantes(): array{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    //$cuenta_existente = $id_user ? 'true' : 'false';
    if($id_user != ""){ //si la variable de sesión está vacia entonces se redirige al login
        $cuenta_existente = true;
    }
    //SE VALIDA DE QUE TENGA UNA CUENTA EXISTENTE
    if($cuenta_existente){
        try {
            require '../../../conexion.php';
            $sql = "SELECT * FROM `restaurantes` WHERE `id_propietario` = $id_user";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            $i = 0;
            //SI CUENTA CON RESTAURANTES
            if(mysqli_num_rows($consulta)!=0){
                while ($row = mysqli_fetch_assoc($consulta)) {
                    $respuesta[$i]['id_restaurante'] = $row['id_restaurante'];
                    $respuesta[$i]['nombre'] = $row['nombre'];
                    $respuesta[$i]['telefono'] = $row['telefono'];
                    $respuesta[$i]['descripcion'] = $row['descripcion_corta'];
                    $respuesta[$i]['foto'] = $row['foto'];
                    $i++;
                }
            }
            else{
                //SI NO CUENTA CON RESTAURANTES
                $respuesta = array(
                    'respuesta' => "sin_restaurantes",
                    'consulta' => mysqli_num_rows($consulta)
                );  
            }
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => "entro al catch "
            );
        }
    }
    return $respuesta;
}


function info_restaurante(): array{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    if($id_user != ""){ //si la variable de sesión está vacia entonces se redirige al login
        $cuenta_existente = true;
    }
    //SE VALIDA DE QUE TENGA UNA CUENTA EXISTENTE
    if($cuenta_existente){
        $id_restaurante = $_POST['id'];
        try {
            require '../../../conexion.php';
            $sql = "SELECT * FROM `restaurantes` WHERE `id_propietario` = $id_user and `id_restaurante` = $id_restaurante";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            //SI CUENTA CON RESTAURANTES
            if(mysqli_num_rows($consulta)!=0){
                $row = mysqli_fetch_assoc($consulta);
                $respuesta = array(
                    'id'        => $row['id_restaurante'],
                    'nombre'    => $row['nombre'],
                    'telefono'  => $row['telefono'],
                    'descripcion'=> $row['descripcion_corta'],
                    'descripcion_larga'=> $row['des_larga'],
                    'horario'   => $row['horario'],
                    'correo'    => $row['correo'],
                    'cp'        => $row['codigo_postal'],
                    'direccion' => $row['direccion'],
                    'ciudad'    => $row['ciudad'],
                    'foto'      => $row['foto']
                ); 
            }
            else{
                //SI NO CUENTA CON RESTAURANTES
                $respuesta = array(
                    'respuesta' => "sin_restaurantes",
                    'consulta' => mysqli_num_rows($consulta)
                );  
            }
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => "entro al catch "
            );
        }
    }
    return $respuesta;
}

?>

