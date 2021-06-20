<!doctype html>
<html lang="es-ES">
    <head>
        <?php 
        include '../componentes/header.html';
        ?>
        <link rel="stylesheet" href="../../src/css/login.scss" type="text/css">

    </head>
    <body>
        
        <div class="container">
            <div style="background:#00000099; color:white; font-weight:bold; padding:15px; border:3px solid #B34F19; margin-top:40px; margin-bottom:40px; text-align:center; font-size:22px; border-radius:10px;">
                <h1>Iniciar sesión</h1>
                <form id="login_inicio">
                    <input type="text" id="usuario" placeholder="usuario">
                    <br>
                    <input type="password" id="contraseña" placeholder="contraseña">
                    <br><br>
                    <input type="submit" value="Ingresar">
                </form>
                <p></p>
                <div class="login">
                    <p>¿No tienes una cuenta?<a href="registro.php"> Registrate</a></p>
                    <p>¿Olvidaste tu contraseña?<a href="recuperar.php"> Recuperala</a></p>
                </div>
            </div>
        </div>
        <script src="../../inc/funciones/login/login.js" type="module"></script>
    </body>
</html>