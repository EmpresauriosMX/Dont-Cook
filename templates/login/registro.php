<!doctype html>
<html lang="es-ES">
    <head>
        <?php 
        include '../componentes/header.html';
        ?>
        <link rel="stylesheet" href="../../src/css/registro.css" type="text/css">

    </head>
    <body style="background-image: linear-gradient(to top, #3a3a3a,#202020 100%);">
        
        <div class="container">
            <div style="background-color: #ffa04b;
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 20.0px );
-webkit-backdrop-filter: blur( 20.0px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );color:white; font-weight:bold; padding:15px; margin-top:40px; margin-bottom:40px; text-align:center; font-size:13px; border-radius:10px;">
                <h1>Registro</h1>
                <form name="form_registro" id="form_registro" >
                    <input required type="text" id="nombres" name="nombres" placeholder="Nombre/s">
                    <br>
                    <input required type="text" id="apellidos" name="apellidos" placeholder="Apellidos">
                    <br>
                    <input required type="text" id="correo" name="correo" placeholder="Correo">
                    <br>
                    <input required type="text" id="usuario" name="usuario" placeholder="Usuario">
                    <br>
                    <input required type="password" id="contrasenia1" name="contraseña" placeholder="Contraseña">
                    <br>
                    <input required type="password" id="contrasenia2" name="confirma_contra" placeholder="Confirmar Contraseña">
                    
                    <br><br>
                    <input type="submit" value="Registrarse">
                </form>
                <p></p>
                <div class="login">
                    <p>¿Ya tienes una cuenta?<a href="login.php"> Inicia Sesion</a></p>
                </div>
            </div>
        </div>
        <script src="../../inc/funciones/login/registro.js" type="module"></script>
        
    </body>
</html>