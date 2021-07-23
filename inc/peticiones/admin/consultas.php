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


//--------ACTUALIZACION DE DATOS EN EDIT RESTAURANTE
function actualiza_datos_generales(): array
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
        $id_res = $_POST['id'];
        $nombre = $_POST['nombre'];
        $des_corta = $_POST['desc_corta'];
        $des_larga = $_POST['desc_larga'];
        $serv_domicilio = (int) $_POST['servicio'];
        try {
            //ACTUALIZACION DEL RESTAURANTE GENERAL
            require '../../../conexion.php';
            $sql = "UPDATE `restaurantes` 
                    SET `nombre`='$nombre',`descripcion_corta`='$des_corta',
                        `des_larga`='$des_larga',`serv_dom`= $serv_domicilio 
                        WHERE `id_propietario` = $id_user and `id_restaurante` = $id_res";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            $respuesta = array(
                'respuesta' => "ok",
            );
            
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            return $respuesta;
        }
    }
    return $respuesta;
}

function actualiza_datos_contacto(): array
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
        $id_res = $_POST['id'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $face = $_POST['face'];
        $insta = $_POST['insta'];
        try {
            //ACTUALIZACION DEL RESTAURANTE GENERAL
            require '../../../conexion.php';
            $sql = "UPDATE `restaurantes` 
                    SET `telefono`='$telefono',`correo`='$email',
                        `fb`='$face',`inst`='$insta' 
                    WHERE  `id_propietario` = $id_user and `id_restaurante` = $id_res";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            $respuesta = array(
                'respuesta' => "ok",
            );
            
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            return $respuesta;
        }
    }
    return $respuesta;
}
function actualiza_datos_ciudad(): array
{
    $cuenta_existente = false;
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { 
        $cuenta_existente = true;
    }
    if ($cuenta_existente) {
        $id_res = $_POST['id'];
        $direccion = $_POST['direccion'];
        $codigo_postal = $_POST['codigo_postal'];
        $ciudad = $_POST['ciudad'];
        try {
            require '../../../conexion.php';
            $sql = "UPDATE `restaurantes` 
                    SET `ciudad`='$ciudad',`direccion`='$direccion',
                        `codigo_postal`='$codigo_postal'
                    WHERE  `id_propietario` = $id_user and `id_restaurante` = $id_res";
            $consulta = mysqli_query($conn, $sql);
            $respuesta = [];
            $respuesta = array(
                'respuesta' => "ok",
            );
            
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
            return $respuesta;
        }
    }
    return $respuesta;
}

function actualiza_datos_horario(): array
{
    $cuenta_existente = false;
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { 
        $cuenta_existente = true;
    }
    if ($cuenta_existente) {

        
        $id_res = (int) $_POST['id'];
        try {
            require '../../../conexion.php';
            $selecionar = "SELECT  * FROM `fechas` WHERE id_restaurante = $id_res";
            $resultado_seleccionar = mysqli_query($conn, $selecionar);  
            $row = mysqli_fetch_assoc($resultado_seleccionar);   

            if ($row) {
                $sentencia_eliminar = "DELETE FROM `fechas` WHERE id_restaurante = $id_res";
                mysqli_query($conn, $sentencia_eliminar);  
                $respuestaaaaaa = true;
            }else {
                $respuestaaaaaa = false;
            }

            $ingresar_horario = $conn->prepare("INSERT INTO fechas ( id_restaurante, dia, hora_inicio, hora_fin) VALUES (?,?,?,?)");
            $ingresar_horario->bind_param('iiss', $id_res, $dia, $inicio, $fin);

            $fechas = json_decode($_POST['horarios']);
            foreach ($fechas as $value) {
                $dia = (int) $value->id_dia;
                $inicio = $value->hora_inicio;
                $fin = $value->hora_fin;
                $ingresar_horario->execute();
            }
            $respuesta = array(
                'nombre' => $respuestaaaaaa,
            );
            
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
        }
    }
    return $respuesta;
}
function actualiza_datos_categoria(): array
{
    $cuenta_existente = false;
    session_start();
    $id_user = $_SESSION['id'];
    if ($id_user != "") { 
        $cuenta_existente = true;
    }
    if ($cuenta_existente) {

        
        $id_res = (int) $_POST['id'];
        try {
            require '../../../conexion.php';
            $selecionar = "SELECT  * FROM `categorias_restaurantes` WHERE id_restaurante = $id_res";
            $resultado_seleccionar = mysqli_query($conn, $selecionar);  
            $row = mysqli_fetch_assoc($resultado_seleccionar);   

            if ($row) {
                $sentencia_eliminar = "DELETE FROM `categorias_restaurantes` WHERE id_restaurante = $id_res";
                mysqli_query($conn, $sentencia_eliminar);  
                $respuestaaaaaa = true;
            }else {
                $respuestaaaaaa = false;
            }
            $ingresar_categoria = $conn->prepare("INSERT INTO categorias_restaurantes ( id_categoria, id_restaurante) VALUES (?,?)");
            $ingresar_categoria->bind_param('ii', $id_categoria, $id_res);

            $categorias = json_decode($_POST['categorias']);

            foreach ($categorias as $value) {
                $id_categoria = (int) $value -> id;
                $ingresar_categoria->execute();
            }
            $respuesta = array(
                'nombre' => $respuestaaaaaa,
            );
            
        } catch (\Throwable $th) {
            $respuesta = array(
                'respuesta' => $th
            );
        }
    }
    return $respuesta;
}
//--------ACTUALIZACION DE DATOS EN EDIT RESTAURANTE


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
    /*
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
    */
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
    } catch (\Throwable $th) {
    }
    return $respuesta;
}
