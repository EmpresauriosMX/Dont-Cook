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

    <?php
        include '../componentes/footer.html';
        include '../componentes/scripts.html';
    ?>
</body>

<script src="../../inc/funciones/admin/mostrar_res.js" type="module"></script>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


<!-- Initialize Quill editor-->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    function jssave() {

        let contenido = quill.container.firstChild.innerHTML;
        fetch("../../inc/peticiones/admin/menu.php?contenido=" + contenido);
        alert("El menú se a guardado");

    }
</script>

</html>