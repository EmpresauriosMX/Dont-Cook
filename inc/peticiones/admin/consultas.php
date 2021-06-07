<?php



function enviar(): array{

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $des_corta = $_POST['desc_corta'];
    $des_larga = $_POST['desc_larga'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $email = $_POST['email'];
    $horarios = $_POST['horarios'];

    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare("INSERT INTO restaurantes (nombre, telefono, descripcion_corta, des_larga, horario, correo, codigo_postal, direccion,ciudad)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");

        $stmt->bind_param('sssssssss', $nombre, $telefono, $des_corta, $des_larga, $horarios, $email, $cp, $direccion,$ciudad);
        $stmt -> execute();


       $stmt->close();

       $respuesta = array(
        'nombre' => $nombre,
        'telefono'=> $telefono,
        'corta' => $des_corta,
        'larga' => $des_larga,
        'horarios' => $horarios,
        'email' => $email,
        'CP' => $cp,
        'ciudad' => $ciudad,
        'direccion' => $direccion
    );
       return $respuesta;

    } catch (\Throwable $th) {
        $respuesta = array(
            'respuesta' => $th
        );
        return $respuesta;
    }

    

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


?>