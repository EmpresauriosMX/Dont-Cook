<!DOCTYPE html>
<html lang="zxx">

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

   
   <!-- Barra de Imagen
   <section class="breadcrumb-section set-bg" data-setbg="../../src/img/fondo.jpeg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 id="nombre_restaurante">PikaTako</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Categoria del restaurante: </a>
                            <span>Cat 1, Cat 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   Fin Barra de Imagen -->
<br>


    <!--contenido de la plantilla -->
     <?php
        include '../componentes/res_especifico.html';
     ?>
    <!--Fin contenido de la plantilla -->
   
    <script src="../../inc/funciones/restaurantes/mostrar_res.js" type="module"></script>
    <br>
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>