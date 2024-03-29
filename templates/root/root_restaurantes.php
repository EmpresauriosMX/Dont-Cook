<?php
    include '../../inc/peticiones/login/session_root.php';
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
            <h2>Todos los restaurantes</h2>
        </div>
        <div class="row mt-3">
            <!--restaurante 1-->
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="../../src/img/restaurants/pikalogodarkmode.png">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">pequeña descripción</a></h6>
                        <h5>Restaurante</h5>
                    </div>
                </div>
            </div>
            <!--restaurante 2-->
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="../../src/img/restaurants/pikalogodarkmode.png">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">pequeña descripción</a></h6>
                        <h5>Restaurante</h5>
                    </div>
                </div>
            </div>
            <!--restaurante 3-->
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="../../src/img/restaurants/pikalogodarkmode.png">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">pequeña descripción</a></h6>
                        <h5>Restaurante</h5>
                    </div>
                </div>
            </div>
            <!--restaurante 4-->
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="../../src/img/restaurants/pikalogodarkmode.png">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">pequeña descripción</a></h6>
                        <h5>Restaurante</h5>
                    </div>
                </div>
            </div>

        </div>

        
    </div>



<!--contenido de la plantilla -->
    <?php 
        
        include '../componentes/scripts.html';
    ?>
</body>

</html>
