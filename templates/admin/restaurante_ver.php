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
    include '../componentes/sesiones.php';
    //include '../componentes/navegacion_reducido.html';
    ?>


    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!------------------------- Barra de Imagen >
    <section class="breadcrumb-section set-bg" data-setbg="../../src/img/fondo.jpeg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 id="nombre_restaurante">PikaTako</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <-------------------------------------------------------- Fin Barra de Imagen -->
    

    <!--contenido de la plantilla -->
    <?php
        include '../componentes/restaurante_especifico.html';
        include '../componentes/footer.html';
        include '../componentes/scripts.html';
    ?>
    
       
        
</body>

<script src="../../inc/funciones/restaurantes/mostrar_res.js" type="module"></script>

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