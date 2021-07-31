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

    <div class="container" id ="container">
        <!--TODAS LAS PROMOCIONES-->
        <!--Tarjetas de promociones-->
        <div class="section-title mt-3">
            <h2>Todas los usuarios</h2>
        </div>
        <div class="card-columns mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nombre</th>
                        <th scope="col">apellido</th>
                        <th scope="col">correo</th>
                        <th scope="col">usuario</th>
                        <th scope="col">estado</th>
                        <th scope="col">editar_estado</th>


                    </tr>
                </thead>
                <tbody id="contenedor_usuarios">
       
                </tbody>
            </table>
        </div>
        <!--Fin de tarjetas de promociones-->

    </div>



    <!--contenido de la plantilla -->
    <?php

    include '../componentes/scripts.html';
    ?>
    <script src="../../inc/funciones/root/usuarios.js" type="module"></script>
</body>

</html>