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
    <div class="container">
    </div>
    <!--Todo de home-->

    <section class="categories">
        <div id="contenedor" class="container">
            <br>
            <div id="mensaje"></div>
            <!--Tarjetas de promociones-->
            <div  class="section-title mt-3">
                <h2>Promociones de Hoy!</h2>
            </div>
            <div id="contenido_promociones_hoy" class="card-columns">

                <!--Fin de tarjetas de promociones-->
            </div>
            <!--TODAS LAS PROMOCIONES-->
            <!--Tarjetas de promociones-->
            <div  class="section-title mt-3">
                <h2>Todas las promociones</h2>
            </div>
            <div id="contenido_promociones" class="card-columns">
            </div>
            <!--?php include '../../inc/peticiones/promociones/todas_promociones.php'; ?-->
        </div>
    </section>
    <!--Fin de todo de home-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../inc/funciones/promociones/app.js" type="module"></script>
    <!--contenido de la plantilla -->
    <?php
    include '../../templates/componentes/footer.html';
    include '../../templates/componentes/scripts.html';
    ?>
</body>

</html>