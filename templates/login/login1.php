<!doctype html>
<html lang="es-ES">
    <head>
        <?php 
        include '../componentes/header.html';
        ?>
        <link rel="stylesheet" href="../../src/css/login1.scss" type="text/css">

    </head>
    <body>
        
        <div class="container">
            <div style="background:#00000099; color:white; font-weight:bold; padding:15px; border:3px solid #B34F19; margin-top:40px; margin-bottom:40px; text-align:center; font-size:22px; border-radius:10px;">
                <h1>Iniciar sesión</h1>
                <form>
                    <input type="text" name="firstname" placeholder="Usuario">
                    <br>
                    <input type="text" name="lastname" placeholder="Email">
                    <br><br>
                    <input type="submit" value="Ingresar">
                </form>
                <p></p>
                <div class="login">
                    <p>¿No tienes una cuenta?<a href="#"> Registrate</a></p>
                </div>
            </div>
        </div>
    </body>
</html>