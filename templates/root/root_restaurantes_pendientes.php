<?php
    include '../../inc/peticiones/login/sesion.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php 
    include '../componentes/header.html';
    ?>
</head>
<body>
   <?php
   include '../componentes/menu_admin.html';

   ?>
   <!--contenido de la plantilla -->

    <div class="container">
        <?php
            include '../componentes/filtros_root.html';
        ?>
        <!--RESTAURANTES-->
        <div class="section-title mt-3">
            <h2>Restaurantes por aprobar</h2>
        </div>
        
        <!--TARJETA DE RESTAURANTES-->
        <?php
            include '../componentes/tarjeta_restaurante.html';
        ?>

        
    </div>



<!--contenido de la plantilla -->
    <?php 
        
        include '../componentes/scripts.html';
    ?>
        <script src="../../inc/funciones/root/restaurantes_pendientes.js" type="module"></script>

</body>

</html>
