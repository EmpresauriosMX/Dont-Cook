<!doctype html>
<html lang="es-ES">
    <head>
        <?php 
        include '../componentes/header.html';
        ?>
        <link rel="stylesheet" href="../../src/css/login.css" type="text/css">

    </head>
    <body style="background-image: linear-gradient(to top, #3a3a3a,#202020 100%);">
        
        <div class="container">
            <div style="
background-color: #ffa04b;
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 20.0px );
-webkit-backdrop-filter: blur( 20.0px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 ); color:white; font-weight:bold; padding:15px; margin-top:40px; margin-bottom:40px; text-align:center; font-size:22px; border-radius:10px;">
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