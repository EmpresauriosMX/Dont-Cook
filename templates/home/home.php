<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php 
    include '../../templates/componentes/header.html';
    ?>
</head>
<body>
   <?php
   include '../../templates/componentes/head.html';
   include '../../templates/componentes/navegacion.html';
   ?>

<!--contenido de la plantilla -->
    <!--Todo de home-->
    <section class="categories ">
        <div class="container">
        <?php
            include '../../templates/componentes/categorias.html';
        ?>
            <div id="mensaje" class="mt-3"></div>


            <!--Tarjetas de promociones-->
            <div id="titulo_promociones" class="section-title mt-3">

            </div>
            <div id="contenedor_promociones" class="card-columns">
                

                
            </div>
            <!--Fin de tarjetas de promociones-->

            <!--RESTAURANTES-->
            <div id="titulo_restaurantes" class="section-title mt-3">
                <h2>Todos los restaurantes</h2>
            </div>

            <div class="row mx-auto"  id="contenedor_restaurantes">
            </div>

            
            <!--FIN RESTAURANTES-->

            
        </div>
    </section>
    <!--Fin de todo de home-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--contenido de la plantilla -->
    <script src="../../inc/funciones/home/home.js" type="module"></script>
    <!--script src="../../inc/funciones/home/categorias.js" type="module"></script-->
    <!--script src="../../inc/funciones/restaurantes/app.js" type="module"></script-->

    <?php 
    include '../../templates/componentes/footer.html';
    include '../../templates/componentes/scripts.html';
    ?>
</body>

</html>

