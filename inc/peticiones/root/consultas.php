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

function mostrar_usuarios(): array
{
        $sql = "SELECT id_usuario,nombres,apellidos,correo,usuario,estado FROM usuarios  ORDER BY usuarios.id_usuario ASC";
    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        //$stmt->bind_param('s', $usuario);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($id,$nombre, $apellido, $correo, $usuario,$estado);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['id'] = $id;
            $respuesta[$i]['nombre'] = $nombre;
            $respuesta[$i]['apellido'] = $apellido;
            $respuesta[$i]['correo'] = $correo;
            $respuesta[$i]['nombre_usuario'] = $usuario;
            $respuesta[$i]['estado'] = $estado;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}

function cambiar_estado_usuario(): array
{
    $cuenta_existente = false;
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { 
        $cuenta_existente = true;
    }
    if ($cuenta_existente) {
        $estado = (int) $_POST['estado'];
        $usuario = $_POST['id_usuario'];
        try {
            require '../../../conexion.php';
            $sql = "UPDATE usuarios SET estado = $estado WHERE usuarios.id_usuario = $usuario";
            mysqli_query($conn, $sql);
            $respuesta = array(
                'respuesta' => "ok",
            );
            
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
        }
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
            $sql = "SELECT * FROM `restaurantes` WHERE `id_restaurante` = $id_restaurante";
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
    //$foto = $_POST['foto'];
    $lunes = $_POST['lunes'];
    $martes = $_POST['martes'];
    $miercoles = $_POST['miercoles'];
    $jueves = $_POST['jueves'];
    $viernes = $_POST['viernes'];
    $sabado = $_POST['sabado'];
    $domingo = $_POST['domingo'];
    //$todos = $_POST['todos'];
    $diai = $_POST['diai'];
    $diaf = $_POST['diaf'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    $message = $_POST['message'];
    $id_res = $_POST['id_res'];

    try {
        
        $tiene_foto = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($tiene_foto) {
            $temp = explode(".", $_FILES["foto"]["name"]);
            $nueva_foto = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES["foto"]["tmp_name"], "../../../src/img/promos/" . $nueva_foto);
        } else {
            $nueva_foto = "fondo.png";
        }

            require '../../../conexion.php';
            $sql = "INSERT INTO promociones (id_promocion, id_restaurante, imagen, descripcion, Nombre, fecha, fecha_f, horario, lunes, martes, miercoles, jueves, viernes, sabado, domingo) 
            VALUES (NULL, '$id_res', '$nueva_foto', '$message', '$nombre', '$diai', '$diaf','de $inicio a $fin', '$lunes' ,'$martes' ,'$miercoles','$jueves','$viernes','$sabado','$domingo')";
            $consulta = mysqli_query($conn, $sql);


            $respuesta = array(
                'respuesta' => "Ingresaron datos",
                'nombre' => $nombre ,
                'id_res' => $id_res ,
                'foto' => $nueva_foto ,
                'lunes' => $lunes ,
                'martes' => $martes ,
                'miercoles' => $miercoles ,
                'jueves' => $jueves ,
                'viernes' => $viernes ,
                'sabado' => $sabado ,
                'domingo' => $domingo ,
                //'todos' => $todos ,
                'dia1' => $diai ,
                'dia2' => $diaf ,
                'incio' => $inicio ,
                'fin' => $fin ,
                'message' => $message
            );

        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            
        }

    return $respuesta;
}

function editar_promo(): array
{
    $nombre = $_POST['nombre'];
    //$foto = $_POST['foto'];
    $id_promocion = $_POST['id_promocion'];
    $lunes = $_POST['lunes'];
    $martes = $_POST['martes'];
    $miercoles = $_POST['miercoles'];
    $jueves = $_POST['jueves'];
    $viernes = $_POST['viernes'];
    $sabado = $_POST['sabado'];
    $domingo = $_POST['domingo'];
    //$todos = $_POST['todos'];
    $diai = $_POST['diai'];
    $diaf = $_POST['diaf'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    $message = $_POST['message'];
    
    try {
            require '../../../conexion.php';
            $sql = "UPDATE `promociones` SET `descripcion`='$message',`Nombre`='$nombre',
                    `fecha`='$diai',`fecha_f`='$diaf',`horario`='de $inicio a $fin',`lunes`='$lunes',
                    `martes`='$martes',`miercoles`='$miercoles',`jueves`='$jueves',`viernes`='$viernes',
                    `sabado`='$sabado',`domingo`='$domingo' WHERE `id_promocion` = $id_promocion";
            $consulta = mysqli_query($conn, $sql);


            $respuesta = array(
                'respuesta' => "Ingresaron datos",
                'nombre' => $nombre ,
                'lunes' => $lunes ,
                'martes' => $martes ,
                'miercoles' => $miercoles ,
                'jueves' => $jueves ,
                'viernes' => $viernes ,
                'sabado' => $sabado ,
                'domingo' => $domingo ,
                //'todos' => $todos ,
                'dia1' => $diai ,
                'dia2' => $diaf ,
                'incio' => $inicio ,
                'fin' => $fin ,
                'message' => $message   
            );

        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            
        }

    return $respuesta;
    
}


function eliminar_promocion(): array
{
    $id_promocion = $_POST['id'];   
    try {
            require '../../../conexion.php';
            $sql = "DELETE FROM `promociones` WHERE `id_promocion` = $id_promocion";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = array(
                'respuesta' => "ok",
                'id' => $id_promocion
            );

        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            
        }

    return $respuesta;
    
}

function verifica_cuenta_interno($id_res): array
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

function ver_promocion(): array
{
    $id_restaurante = $_POST['id'];
    try {
        require '../../../conexion.php';
        $sql = "SELECT `restaurantes`.`nombre` as `nombre_res`,`promociones`.`id_promocion`,
                        `promociones`.`id_restaurante`,`promociones`.`imagen`,
                        `promociones`.`descripcion`,`promociones`.`Nombre`, `promociones`.`fecha`,
                        `promociones`.`fecha_f`,`promociones`.`horario`,
                        `promociones`.`lunes`,`promociones`.`martes`, `promociones`.`miercoles`,
                        `promociones`.`jueves`, `promociones`.`viernes`, `promociones`.`sabado`, 
                        `promociones`.`domingo`
                FROM `restaurantes`,`promociones` 
                WHERE `restaurantes`.`id_restaurante` = `promociones`.`id_restaurante` 
                    AND `promociones`.`id_restaurante` = $id_restaurante";
        $consulta = mysqli_query($conn, $sql);
        $respuesta = [];
        $i = 0;
        //SI CUENTA CON RESTAURANTES
        if (mysqli_num_rows($consulta) != 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                $respuesta[$i]['nombre_res'] =$row["nombre_res"];
                $respuesta[$i]['id_promocion'] = $row["id_promocion"];
                $respuesta[$i]['id_restaurante'] = $row["id_restaurante"];
                $respuesta[$i]['imagen'] = $row["imagen"];
                $respuesta[$i]['descripcion'] = $row["descripcion"];
                //$respuesta[$i]['Dias'] = $dias;
                $respuesta[$i]['Nombre'] = $row["Nombre"];
                $respuesta[$i]['fecha'] = $row["fecha"];
                $respuesta[$i]['fecha_f'] = $row["fecha_f"];
                $respuesta[$i]['horario'] = $row["horario"];
                $respuesta[$i]['lunes'] = $row["lunes"];
                $respuesta[$i]['martes'] = $row["martes"];
                $respuesta[$i]['miercoles'] = $row["miercoles"];
                $respuesta[$i]['jueves'] = $row["jueves"];
                $respuesta[$i]['viernes'] = $row["viernes"];
                $respuesta[$i]['sabado'] = $row["sabado"];
                $respuesta[$i]['domingo'] = $row["domingo"];
                $i++;
            }
        }
        else{
            $respuesta = array(
                'sin_promo' => true
            );
        }
        return $respuesta;
    } catch (\Throwable $th) {
        //throw $th;
    }
}

function ver_promo_especifico(): array
{
    $id_promocion = $_POST['id'];
    try {
        require '../../../conexion.php';
        $sql = "SELECT `restaurantes`.`nombre` as `nombre_res`,`promociones`.`id_promocion`,
                        `promociones`.`id_restaurante`,`promociones`.`imagen`,
                        `promociones`.`descripcion`,`promociones`.`Nombre`, `promociones`.`fecha`,
                        `promociones`.`fecha_f`,`promociones`.`horario`,
                        `promociones`.`lunes`,`promociones`.`martes`, `promociones`.`miercoles`,
                        `promociones`.`jueves`, `promociones`.`viernes`, `promociones`.`sabado`, 
                        `promociones`.`domingo`
                FROM `restaurantes`,`promociones` 
                WHERE `restaurantes`.`id_restaurante` = `promociones`.`id_restaurante` 
                    AND `promociones`.`id_promocion` = $id_promocion";
        $consulta = mysqli_query($conn, $sql);
        $respuesta = [];
        $i = 0;
        //SI CUENTA CON RESTAURANTES
        if (mysqli_num_rows($consulta) != 0) {
            $row = mysqli_fetch_assoc($consulta);
            $respuesta = array(
                'nombre_res' => $row["nombre_res"],
                'id_promocion' => $row["id_promocion"],
                'id_restaurante' => $row["id_restaurante"],
                'imagen' => $row["imagen"],
                'descripcion' => $row["descripcion"],
                'Nombre' => $row["Nombre"],
                'fecha' => $row["fecha"],
                'fecha_f' => $row["fecha_f"],
                'horario' => $row["horario"],
                'lunes' => $row["lunes"],
                'martes' => $row["martes"],
                'miercoles' => $row["miercoles"],
                'jueves' => $row["jueves"],
                'viernes' => $row["viernes"],
                'sabado' => $row["sabado"],
                'domingo' => $row["domingo"]
            );
        }
        return $respuesta;
    } catch (\Throwable $th) {
        //throw $th;
    }
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

function mostrar_restaurantes_pendientes(): array
{
        $sql = "SELECT id_restaurante,nombre,foto,descripcion_corta,verificador FROM restaurantes WHERE verificador = 0  ORDER BY restaurantes.id_restaurante ASC";
    try {
        require '../../../conexion.php';
        $stmt = $conn->prepare($sql);
        //$stmt->bind_param('s', $usuario);
        $stmt->execute();

        // Loguear el usuario
        $stmt->bind_result($id,$nombre, $imagen, $descripcion, $estado);

        $respuesta = [];
        $i = 0;

        while ($stmt->fetch()) {
            $respuesta[$i]['id'] = $id;
            $respuesta[$i]['nombre'] = $nombre;
            $respuesta[$i]['imagen'] = $imagen;
            $respuesta[$i]['descripcion'] = $descripcion;
            $respuesta[$i]['estado'] = $estado;
            $i++;
        }
        $stmt->close();
    } catch (\Throwable $th) {
    }
    return $respuesta;
}

// seccion del menu
function subir_menu(): array
{
    $texto = $_POST['texto'];
    $id = (int)$_POST['id'];
    try {
        $tiene_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($tiene_imagen) {
            $temp = explode(".", $_FILES["imagen"]["name"]);
            $nueva_imagen = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/menus/" . $nueva_imagen);
        } else {
            $nueva_imagen = "fondo.png";
        }
        require '../../../conexion.php';
        $ingresar_horario = $conn->prepare("INSERT INTO menus (id_restaurante,descripcion,imagen) VALUES (?,?,?)");
        $ingresar_horario->bind_param('iss', $id, $texto, $nueva_imagen);
        $ingresar_horario->execute();
    } catch (\Throwable $th) {
    }
    $respuesta = array(
        'recibo' => $texto,
        'id_recibido' => $id,
        'nueva_imagen' => $nueva_imagen
    );
    return $respuesta;
}


function actualizar_menu(): array
{
    $texto = $_POST['texto'];
    $id = (int)$_POST['id'];
    try {

        require '../../../conexion.php';
        $selecionar = "SELECT imagen FROM menus WHERE id_restaurante = $id";
        $resultado_seleccionar = mysqli_query($conn, $selecionar);
        $foto_db = mysqli_fetch_array($resultado_seleccionar);
        $ruta_foto_db = "../../../src/img/menus/" . $foto_db['imagen'];
        // buscar si ya existe un menu en la base de datos

        //guardar la imagen recibida en forma de espera
        $tiene_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($tiene_imagen) {
            $temp = explode(".", $_FILES["imagen"]["name"]);
            $nueva_imagen = round(microtime(true)) . '.' . end($temp);
        } else {
            $nueva_imagen = "fondo.png";
        }
        if ($foto_db) { //existe la imagen y es difrente al fondo
            if ($foto_db['imagen'] != "fondo.png") {
                unlink($ruta_foto_db);
            }
            $sql = "UPDATE `menus` SET `descripcion`='$texto',`imagen`='$nueva_imagen' WHERE id_restaurante = $id";
        } else {            //agregar nuevo menu
            $sql = "INSERT INTO `menus` (`id_menu`, `id_restaurante`, `descripcion`, `imagen`) VALUES (NULL, '$id', '$texto', '$nueva_imagen')";
        }
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/menus/" . $nueva_imagen);

        $consulta = mysqli_query($conn, $sql);

        $respuesta = array(
            'recibo' => $texto,
            'id_recibido' => $id,
            'nueva_imagen' => $nueva_imagen
        );
    } catch (\Throwable $th) {
    }

    return $respuesta;
};

function mostrar_menu(): array
{
    $id = (int)$_POST['id'];
    try {
        require '../../../conexion.php';

        $sql = "SELECT * FROM `menus` WHERE `id_restaurante` = $id";
        $consulta = mysqli_query($conn, $sql);
        $respuesta = [];
        $i = 0;
        //SI CUENTA CON RESTAURANTES
        if (mysqli_num_rows($consulta) != 0) {
            while ($row = mysqli_fetch_assoc($consulta)) {
                $respuesta[$i]['descripcion'] = $row['descripcion'];
                $respuesta[$i]['imagen'] = $row['imagen'];
                $i++;
            }
        }
        else{
            $respuesta = array(
                'sin_menu' => true
            );
        }
    } catch (\Throwable $th) {
    }
    return $respuesta;
}
function cambiar_imagen_menu(): array
{
    $id = (int)$_POST['id'];
    try {

        require '../../../conexion.php';
        $selecionar = "SELECT imagen FROM menus WHERE id_restaurante = $id";
        $resultado_seleccionar = mysqli_query($conn, $selecionar);
        $foto_db = mysqli_fetch_array($resultado_seleccionar);
        $ruta_foto_db = "../../../src/img/menus/" . $foto_db['imagen'];

        //guardar la imagen recibida en forma de espera
        $tiene_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($tiene_imagen) {
            $temp = explode(".", $_FILES["imagen"]["name"]);
            $nueva_imagen = round(microtime(true)) . '.' . end($temp);
        } else {
            $nueva_imagen = "fondo.png";
        }
        if ($foto_db) { //existe la imagen y es difrente al fondo
            if ($foto_db['imagen'] != "fondo.png") {
                unlink($ruta_foto_db);
            }
            $sql = "UPDATE `menus` SET `imagen`='$nueva_imagen' WHERE id_restaurante = $id";
        } 
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/menus/" . $nueva_imagen);

         mysqli_query($conn, $sql);

        $respuesta = array(
            'recibo' => $texto,
            'id_recibido' => $id,
            'nueva_imagen' => $nueva_imagen
        );
    } catch (\Throwable $th) {
    }

    return $respuesta;
};

function cambiar_imagen_promocion(): array
{
    $id = (int)$_POST['id'];
    try {
        require '../../../conexion.php';

        $selecionar = "SELECT imagen FROM promociones WHERE id_promocion = $id";
        $resultado_seleccionar = mysqli_query($conn, $selecionar);
        $foto_db = mysqli_fetch_array($resultado_seleccionar);
        $ruta_foto_db = "../../../src/img/promos/" . $foto_db['imagen'];
        //guardar la imagen recibida en forma de espera
        $tiene_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($tiene_imagen) {
            $temp = explode(".", $_FILES["imagen"]["name"]);
            $nueva_imagen = round(microtime(true)) . '.' . end($temp);
        } else {
            $nueva_imagen = "fondo.png";
        }
        if ($foto_db) { //existe la imagen y es difrente al fondo
            if ($foto_db['imagen'] != "fondo.png") {
                unlink($ruta_foto_db);
            }
            $sql = "UPDATE `promociones` SET `imagen`='$nueva_imagen' WHERE id_promocion = $id";
        }
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/promos/" . $nueva_imagen);

        mysqli_query($conn, $sql);


        $respuesta = array(
            'se cambioa el texto' => $selecionar,
            'tiene foto' => $resultado_seleccionar,
            'fotodb' => $foto_db,
            'id_recibido' => $id,
            'nueva_imagen' => $ruta_foto_db
        );
    } catch (\Throwable $th) {
    }

    return $respuesta;
};


function cambiar_imagen_restaurante(): array
{
    $id = (int)$_POST['id'];
    try {
        require '../../../conexion.php';

        $selecionar = "SELECT foto FROM restaurantes WHERE id_restaurante = $id";
        $resultado_seleccionar = mysqli_query($conn, $selecionar);
        $foto_db = mysqli_fetch_array($resultado_seleccionar);
        $ruta_foto_db = "../../../src/img/restaurantes/" . $foto_db['foto'];
        //guardar la imagen recibida en forma de espera
        $tiene_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($tiene_imagen) {
            $temp = explode(".", $_FILES["imagen"]["name"]);
            $nueva_imagen = round(microtime(true)) . '.' . end($temp);
        } else {
            $nueva_imagen = "fondo.png";
        }
        if ($foto_db) { //existe la imagen y es difrente al fondo
            if ($foto_db['foto'] != "fondo.png") {
                unlink($ruta_foto_db);
            }
            $sql = "UPDATE `restaurantes` SET `foto`='$nueva_imagen' WHERE id_restaurante = $id";
        }
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../src/img/restaurantes/" . $nueva_imagen);

        mysqli_query($conn, $sql);


        $respuesta = array(
            'se cambioa el texto' => $selecionar,
            'tiene foto' => $resultado_seleccionar,
            'fotodb' => $foto_db,
            'id_recibido' => $id,
            'nueva_imagen' => $ruta_foto_db
        );
    } catch (\Throwable $th) {
    }

    return $respuesta;
};

  

function cambiar_estado_restaurante(): array
{
    $cuenta_existente = false;
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { 
        $cuenta_existente = true;
    }
    if ($cuenta_existente) {
        $estado = (int) $_POST['estado'];
        $restaurante =(int) $_POST['id_restaurante'];
        try {
            require '../../../conexion.php';
            $sql = "UPDATE restaurantes SET verificador = $estado WHERE restaurantes.id_restaurante = $restaurante";
            mysqli_query($conn, $sql);
            $respuesta = array(
                'respuesta' => "ok"
            );
            
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
        }
    }
    return $respuesta;
}