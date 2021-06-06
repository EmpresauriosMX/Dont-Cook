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
                <h1>Recuperar Contraseña</h1>
                <form action="../../inc/funciones/login/fun.php" method="post">
                    <input type="email" id="email" name="email" placeholder="email">
                    <br><br>
                    <input type="submit" value="Enviar">
                </form>
                <p></p>
            </div>
        </div>

    </body>
</html>