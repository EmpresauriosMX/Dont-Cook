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
    <div id="banner_categoria">
        
    </div>
    

    <!--contenido de la plantilla -->
    <div class="container mt-3">

    
        <!-- Categories Section Begin -->
        <?php
            include '../../templates/componentes/categorias.html';
        ?>
        <!-- Categories Section End -->

        <!--RESTAURANTES-->
        <div class="section-title">
            <h2 id="titulo_restaurantes"> Todos los restaurantes</h2>
        </div>
        <div id="mensaje"></div>

        <div class="row mx-auto"  id="contenedor_restaurantes">
        </div>
    
    </div>
<script src="../../inc/funciones/restaurantes/app.js" type="module"></script>


    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>