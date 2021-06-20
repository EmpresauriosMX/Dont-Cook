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
        <div class="container">
            <br>
            <!-- Fin slider de categorias -->

            <!--Tarjetas de promociones-->
            <div class="section-title mt-3">
                <h2>Promociones de Hoy!</h2>
            </div>
            <div class="card-columns">
                <?php
                    $day = date("l");
                    switch ($day) {
                        case "Sunday":
                            include '../../inc/peticiones/promociones/promociones_domingo.php';
                        break;
                        case "Monday":
                            include '../../inc/peticiones/promociones/promociones_lunes.php';
                        break;
                        case "Tuesday":
                            include '../../inc/peticiones/promociones/promociones_martes.php';
                        break;
                        case "Wednesday":
                            include '../../inc/peticiones/promociones/promociones_miercoles.php';
                        break;
                        case "Thursday":
                            include '../../inc/peticiones/promociones/promociones_jueves.php';
                        break;
                        case "Friday":
                            include '../../inc/peticiones/promociones/promociones_viernes.php';
                        break;
                        case "Saturday":
                            include '../../inc/peticiones/promociones/promociones_sabado.php';
                        break;
                    }
                ?>
                <!--Fin de tarjetas de promociones-->
            </div>
            <!--TODAS LAS PROMOCIONES-->
            <!--Tarjetas de promociones-->
            <div class="section-title mt-3">
                <h2>Todas las promociones</h2>
            </div>
            <?php include '../../inc/peticiones/promociones/todas_promociones.php'; ?>
        </div>
    </section>
    <!--Fin de todo de home-->
    <script src="../../inc/funciones/home/categorias.js" type="module"></script>
<!--contenido de la plantilla -->
    <?php 
    include '../../templates/componentes/footer.html';
    include '../../templates/componentes/scripts.html';
    ?>
</body>

</html>