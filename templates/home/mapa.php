<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include '../componentes/header.html';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

</head>

<body>
    <?php
    include '../componentes/head.html';
    include '../componentes/navegacion_reducido.html';
    ?>
    <!--contenido de la plantilla -->

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div id="mapid" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="col-md-3">
                <select id="ciudades" onchange="asignar_nueva_ciudad()">
                    <option value="cozumel">cozumel</option>
                    <option value="cancun">cancun</option>
                    <option value="puerto">puerto</option>
                </select>
            </div>
        </div>
    </div>

    <!--contenido de la plantilla -->
    <script src="../../inc/funciones/home/mapa.js"></script>
    <?php
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>