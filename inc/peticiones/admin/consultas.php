<?php
function enviar(): array
{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    //$cuenta_existente = $id_user ? 'true' : 'false';
    if ($id_user != "") { //si la variable de sesión está vacia entonces se redirige al login
        $cuenta_existente = true;
    }
    //SE VALIDA DE QUE TENGA UNA CUENTA EXISTENTE
    if ($cuenta_existente) {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $des_corta = $_POST['desc_corta'];
        $des_larga = $_POST['desc_larga'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $cp = $_POST['cp'];
        $email = $_POST['email'];
        //  $horarios = $_POST['horarios'];
        $face = $_POST['face'];
        $inta = $_POST['insta'];
        $serv_domicilio = (int) $_POST['servicio'];
        try {
            $tiene_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);
            if ($tiene_imagen) {
                $temp = explode(".", $_FILES["imagen"]["name"]);
                $nueva_imagen = round(microtime(true)) . '.' . end($temp);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/restaurantes/" . $nueva_imagen);
            } else {
                $nueva_imagen = "fondo.png";
            }
            require '../../../conexion.php';

            //ingreso del restaurante
            $stmt = $conn->prepare("INSERT INTO restaurantes ( nombre,id_propietario,telefono,foto,descripcion_corta,des_larga,correo,codigo_postal,direccion,ciudad,fb,inst,serv_dom)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('ssssssssssssi', $nombre, $id_user, $telefono, $nueva_imagen, $des_corta, $des_larga, $email, $cp, $direccion, $ciudad, $face, $inta, $serv_domicilio);
            $stmt->execute();
            $stmt->close();

            //ingreso del horario
            $ingresar_horario = $conn->prepare("INSERT INTO fechas ( id_restaurante, dia, hora_inicio, hora_fin) VALUES (?,?,?,?)");
            $ingresar_horario->bind_param('iiss', $nuevo_id, $dia, $inicio, $fin);

            //ingreso de las categorias

            $ingresar_categoria = $conn->prepare("INSERT INTO categorias_restaurantes ( id_categoria, id_restaurante) VALUES (?,?)");
            $ingresar_categoria->bind_param('ii', $id_categoria, $nuevo_id);


            //variables
            /*  $dia = 2;
            $inicio = "14:28";
            $fin = "03:11"; 
            $ingresar_horario -> execute();*/
            $nuevo_id = mysqli_insert_id($conn); // id del restaurante insertado


            $fechas = json_decode($_POST['horarios']);
            foreach ($fechas as $value) {
                $dia = (int) $value->id_dia;
                $inicio = $value->hora_inicio;
                $fin = $value->hora_fin;
                $ingresar_horario->execute();
            }

            $categorias = json_decode($_POST['categorias']);

            foreach ($categorias as $value) {
                $id_categoria = (int) $value -> id;
                $ingresar_categoria->execute();
            }

            $respuesta = array(
                'estado' => $tiene_imagen,
                'imagen' => $nueva_imagen,
                'estado' => 'correcto',
                'id' => mysqli_insert_id($conn),
                'nuevo id' => $nuevo_id,
                'servicio' => $serv_domicilio,
                'fechas' => $_POST['horarios'],
                'categoria' => $_POST['categorias']
            );

            return $respuesta;
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            return $respuesta;
        }
    }
    return $respuesta;
}

function restaurantes_home(): array
{

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
        $stmt->execute();

        $respuesta = array(
            'nombre' => $nombre,
            'telefono' => $telefono,
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

function verifica_cuenta(): array
{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    //$cuenta_existente = $id_user ? 'true' : 'false';
    if ($id_user != "") { //si la variable de sesión está vacia entonces se redirige al login
        //header("location: ../../../index.html");
        $cuenta_existente = true;
    }

    $respuesta = array(
        'cuenta_existente' => $cuenta_existente,
        'id_cuenta_activa' => $id_user
    );


    return $respuesta;
}

function busca_restaurantes(): array
{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    //$cuenta_existente = $id_user ? 'true' : 'false';
    if ($id_user != "") { //si la variable de sesión está vacia entonces se redirige al login
        $cuenta_existente = true;
    }
    //SE VALIDA DE QUE TENGA UNA CUENTA EXISTENTE
    if ($cuenta_existente) {
        try {
            require '../../../conexion.php';
            $sql = "SELECT * FROM `restaurantes` WHERE `id_propietario` = $id_user";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            $i = 0;
            //SI CUENTA CON RESTAURANTES
            if (mysqli_num_rows($consulta) != 0) {
                while ($row = mysqli_fetch_assoc($consulta)) {
                    $respuesta[$i]['id_restaurante'] = $row['id_restaurante'];
                    $respuesta[$i]['nombre'] = $row['nombre'];
                    $respuesta[$i]['telefono'] = $row['telefono'];
                    $respuesta[$i]['descripcion'] = $row['descripcion_corta'];
                    $respuesta[$i]['foto'] = $row['foto'];
                    $i++;
                }
            } else {
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


function horario_restaurante(): array
{   
        $id_restaurante = $_POST['id'];
        try {
            require '../../../conexion.php';
            $sql = "SELECT * FROM `fechas` WHERE `id_restaurante` = $id_restaurante";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            $i = 0;
            //SI CUENTA CON RESTAURANTES
            if (mysqli_num_rows($consulta) != 0) {
                while ($row = mysqli_fetch_assoc($consulta)) {
                    $respuesta[$i]['id_restaurante'] = $row['id_restaurante'];
                    $respuesta[$i]['id_fechas'] = $row['id_fechas'];
                    $respuesta[$i]['dia'] = $row['dia'];
                    $respuesta[$i]['hora_inicio'] = $row['hora_inicio'];
                    $respuesta[$i]['hora_fin'] = $row['hora_fin'];
                    $i++;
                }
            } else {
                //SI NO CUENTA CON RESTAURANTES
                $respuesta = array(
                    'respuesta' => "sin_horario",
                    'consulta' => mysqli_num_rows($consulta)
                );
            }
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => "entro al catch "
            );
        }
    return $respuesta;
}

function info_restaurante(): array
{
    $cuenta_existente = false;
    //-----------SE ABRE LA SESIÓN DEL USUARIO
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { //si la variable de sesión está vacia entonces se redirige al login
        $cuenta_existente = true;
    }
    //SE VALIDA DE QUE TENGA UNA CUENTA EXISTENTE
    if ($cuenta_existente) {
        $id_restaurante = $_POST['id'];
        try {
            require '../../../conexion.php';
            $sql = "SELECT * FROM `restaurantes` WHERE `id_propietario` = $id_user and `id_restaurante` = $id_restaurante";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            //SI CUENTA CON RESTAURANTES
            if (mysqli_num_rows($consulta) != 0) {
                $row = mysqli_fetch_assoc($consulta);
                $respuesta = array(
                    'id'        => $row['id_restaurante'],
                    'nombre'    => $row['nombre'],
                    'telefono'  => $row['telefono'],
                    'descripcion' => $row['descripcion_corta'],
                    'descripcion_larga' => $row['des_larga'],
                    'horario'   => $row['horario'],
                    'correo'    => $row['correo'],
                    'cp'        => $row['codigo_postal'],
                    'direccion' => $row['direccion'],
                    'ciudad'    => $row['ciudad'],
                    'foto'      => $row['foto'],
                    'serv_dom'  => $row['serv_dom'],
                    'fb'  => $row['fb'],
                    'inst'  => $row['inst']
                );
            } else {
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

function agregar_promocion(): array
{
    $nombre = $_POST['nombre'];
    $foto = $_POST['foto'];
    $lunes = $_POST['lunes'];
    $martes = $_POST['martes'];
    $miercoles = $_POST['miercoles'];
    $jueves = $_POST['jueves'];
    $viernes = $_POST['viernes'];
    $sabado = $_POST['sabado'];
    $domingo = $_POST['domingo'];
    $todos = $_POST['todos'];
    $dia = $_POST['dia'];
    $message = $_POST['message'];

    require '../../../conexion.php';
    $sql = "INSERT INTO promociones (id_promocion, id_restaurante, imagen, descripcion, Dias, Nombre) 
                             VALUES (NULL, '1', '$foto', '$message', '$lunes$martes$miercoles', '$nombre')";
    $consulta = mysqli_query($conn, $sql);

    $respuesta = array(
        'respuesta' => "Ingresaron datos",
        'ver respuesta nombre' => $nombre ,
        'ver respuesta foto' => $foto ,
        'ver respuesta lunes' => $lunes ,
        'ver respuesta martes' => $martes ,
        'ver respuesta miercoles' => $miercoles ,
        'ver respuesta jueves' => $jueves ,
        'ver respuesta viernes' => $viernes ,
        'ver respuesta sabado' => $sabado ,
        'ver respuesta domingo' => $domingo ,
        'ver respuesta todos' => $todos ,
        'ver respuesta dia' => $dia ,
        'ver respuesta message' => $message
    );

    return $respuesta;
}

function ver_promocion(): array
{

    $promocion = $_POST['nombre'];
    $respuesta = array(
        'respuesta' => "sin_restaurantes",
        'ver respuesta post' => $promocion
    );

    return $respuesta;
}

//categorias
function obtener_categorias(): array
{
    try {
        require '../../../conexion.php';
        $sql = "SELECT id_categoria,nombre FROM categorias";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $stmt->bind_result($id, $nombre);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['id'] = $id;
            $respuesta[$i]['nombre'] = $nombre;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}