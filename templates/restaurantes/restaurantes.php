<!DOCTYPE html>
<html lang="es">

<head>
    <?php 
    include '../componentes/header.html';
    ?>
</head>
<body>
   <?php
   include '../componentes/head.html';
   include '../componentes/navegacion_reducido.html';
   ?>
   <!--contenido de la plantilla -->

    <div class="container">
        <h4>Categorias destacadas</h4>
        <!-- Categories Section Begin -->
        <section class="categories mb-3">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="../../src/img/categories/cat-1.jpg">
                                <h5><a href="#">Fast food</a></h5>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="../../src/img/categories/cat-2.jpg">
                                <h5><a href="#">Taquerías</a></h5>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="../../src/img/categories/cat-3.jpg">
                                <h5><a href="#">Cerca de tí</a></h5>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="../../src/img/categories/cat-4.jpg">
                                <h5><a href="#">Pizzerías</a></h5>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="../../src/img/categories/cat-5.jpg">
                                <h5><a href="#">Carritos de comida</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->

        <!--RESTAURANTES-->
        <div class="section-title">
            <h2>Todos los restaurantes</h2>
        </div>
        <div class="row">
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
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>