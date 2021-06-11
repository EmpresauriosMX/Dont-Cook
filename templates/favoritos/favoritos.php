<!DOCTYPE html>
<html lang="es">

<head>
    <?php 
    include '../componentes/header.html';
    ?>
</head>
<body>
    <?php
    include '../componentes/head.html';
    include '../componentes/navegacion_reducido.html';
    ?>
    <!--contenido de la plantilla -->
    <div class="container">
        

        <!--RESTAURANTES-->
        <div class="section-title">
            <h2>FAVORITOS <span class="fa fa-heart"></span></h2>
        </div>
        <!--EN CASO DE QUE NO TENGA UNA CUENTA O NO TENGA FAVORITOS AQUI SE MUESTRA EL MENSAJE-->
        <div id="mensaje"></div>
        <div class="row">
            <!-- WE OS, AQUI VAS IMPRIMIENDO LOS FAVORITOS -->

        </div>
        


    </div>
    <!--contenido de la plantilla -->
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
    <script src="../../inc/funciones/favoritos/app.js" type="module"></script>
</body>

</html>