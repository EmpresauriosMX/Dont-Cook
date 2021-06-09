<!DOCTYPE html>
<html lang="zxx">

<head>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <?php 
    include '../componentes/header.html';
    ?>

</head>
<body>
    
    <?php
        include '../componentes/head.html';
    ?>

   <!--contenido de la plantilla -->
   <!--contenido de la plantilla -->

    <div class="container mb-5">
            <div class="section-title mt-3">
                <h2>Mis restaurantes</h2>
            </div>
        <div id="mensaje"></div>
        <!-- EN CASO DE QUE NO TENGA RESTAURANTES EN SU CUENTA -->
        <?php
            //include '../pages/sin_restaurantes.html';
        ?>
        <!-- EN CASO DE QUE NO TENGA SU CUENTA -->
        <?php
            //include '../pages/sin_cuenta.html';
        ?>
        <!-- EN CASO DE QUE SI TENGA RESTAURANTES EN SU CUENTA -->
        <div class="row mt-3" id="restaurantes">            
        </div>
        
    </div>

<!--contenido de la plantilla -->
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
   <script src="../../inc/funciones/admin/home.js" type="module"></script>
</body>

</html>