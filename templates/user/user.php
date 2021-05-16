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
            <h2>Cuenta de usuario   </h2>
        </div>
        <!---EN CASO DE QUE NO CUENTE CON UNA CUENTA -->
        <?php
            include '../pages/sin_cuenta.html';
        ?>

        <!---EN CASO DE QUE SI TENGA UNA CUENTA-->
    </div>
    <!--contenido de la plantilla -->
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>