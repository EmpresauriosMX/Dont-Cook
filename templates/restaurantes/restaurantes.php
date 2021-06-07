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
        <!-- Categories Section Begin -->
        <?php
            include '../../templates/componentes/categorias.html';
        ?>
        <!-- Categories Section End -->

        <!--RESTAURANTES-->
        <div class="section-title">
            <h2>Todos los restaurantes</h2>
        </div>
        <div class="row" id="contenedor_restaurantes">


        </div>
        


    </div>



<!--contenido de la plantilla -->
<script src="../../inc/funciones/restaurantes/app.js" type="module"></script>

    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>