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
    include '../componentes/head.html';
    //include '../componentes/navegacion_reducido.html';
    ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    
    <!--contenido de la plantilla -->
    <?php
        include '../componentes/restaurante_especifico.html';
    ?>
    <div id="mensaje"></div>


    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <?php
        include '../componentes/footer.html';
        include '../componentes/scripts.html';
    ?>
</body>

<script src="../../inc/funciones/admin/mostrar_res.js" type="module"></script>
<!--<script src="../../inc/funciones/admin/subir_menu.js"></script>-->

<!-- Include the Quill library -->



<!-- Initialize Quill editor-->

</html>