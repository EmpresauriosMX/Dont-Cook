<!doctype html>
<html lang="es-ES">
    <head>
        <?php 
        include '../componentes/header.html';
        ?>
        <link rel="stylesheet" href="../../src/css/registro.scss" type="text/css">

    </head>
    <body>
        
        <div class="container">
            <div style="background:#00000099; color:white; font-weight:bold; padding:15px; border:3px solid #B34F19; margin-top:40px; margin-bottom:40px; text-align:center; font-size:13px; border-radius:10px;">
                <h1>Registro</h1>
                <form>
                    <input type="text" name="Nombre" placeholder="Nombre">
                    <br>
                    <input type="text" name="apellidos" placeholder="Apellidos">
                    <br>
                    <input type="text" name="usuario" placeholder="Usuario">
                    <br>
                    <input type="text" name="contraseña" placeholder="Contraseña">
                    <br>
                    <input type="text" name="confirma_contra" placeholder="Confirmar Contraseña">
                    <br>
                    <input type="text" name="correo" placeholder="Correo">
                    <br><br>
                    <input type="submit" value="Registrarse">
                </form>
                <p></p>
                <div class="login">
                    <p>¿Ya tienes una cuenta?<a href="#"> Inicia Sesion</a></p>
                </div>
            </div>
        </div>
    </body>
</html>