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
   include '../componentes/navegacion_reducido.html';
   ?>
   
   <!-- Barra de Imagen -->
   <section class="breadcrumb-section set-bg" data-setbg="../../src/img/fondo.jpeg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 id="nombre_restaurante">Restaurante X</h2>
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
    <!-- Fin Barra de Imagen -->
<br>

    <!--contenido de la plantilla -->
    <div class="container">
        <div class="row">
            <!--Slider-->
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <!--Logo del restaurante-->
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="../../src/img/restaurants/pikalogodarkmode.png" alt="">
                    </div>
                    <!--Fin logo del restaurante-->

                    <!--Imagenes del restaurante-->
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="img/product/details/product-details-2.jpg"
                            src="../../src/img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-3.jpg"
                            src="../../src/img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-5.jpg"
                            src="../../src/img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-4.jpg"
                            src="../../src/img/product/details/thumb-4.jpg" alt="">
                    </div>
                    <!--Fin imagenes del restaurante-->

                </div>
            </div>
            <!--Fin slider-->

            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>Vetgetable’s Package</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">$50.00</div>
                    <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                        vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                        quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">ADD TO CARD</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
    <!--Fin contenido de la plantilla -->

    <br>
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>
</html>