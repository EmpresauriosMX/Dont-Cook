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
                <h1>Reestablecer<p></p>Contraseña</h1>
                <form id="reestablecer_contra">
                    <input type="text" id="correo" placeholder="Ingrese su correo">
                    <br>
                    <input type="text" id="contra_nueva" placeholder="Nueva contraseña">
                    <br>
                    <input type="text" id="contra_con" placeholder="Confirmar nueva contraseña">
                    <br><br>
                    <input type="submit" value="Cambiar contraseña">
                </form>
                <p></p>
            </div>
        </div>
        <script src="../../inc/funciones/login/recuperar.js" type="module"></script>
    </body>
</html>