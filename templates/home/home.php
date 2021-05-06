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
        <h3>Categorías destacadas</h3>
    </div>

     <!-- Categories Section Begin -->
     <section class="categories">
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


<!--contenido de la plantilla -->
    <?php 
    include '../../templates/componentes/footer.html';
    include '../../templates/componentes/scripts.html';
    ?>
</body>

</html>