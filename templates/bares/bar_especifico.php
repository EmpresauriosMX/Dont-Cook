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
                        <h2 id="nombre_restaurante">PikaTako</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html"> Home </a>
                            <a href="./index.html"> Bares </a>
                            <span> Bar (Nombre del bar) </span>
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
                        <img data-imgbigurl="../../src/img/restaurants/1.jpg"
                            src="../../src/img/restaurants/1.jpg" alt="">
                        <img data-imgbigurl="../../src/img/restaurants/2.jpg"
                            src="../../src/img/restaurants/2.jpg" alt="">
                        <img data-imgbigurl="../../src/img/restaurants/3.jpg"
                            src="../../src/img/restaurants/3.jpg" alt="">
                        <img data-imgbigurl="../../src/img/restaurants/4.jpg"
                            src="../../src/img/restaurants/4.jpg" alt="">
                    </div>
                    <!--Fin imagenes del restaurante-->

                </div>
            </div>
            <!--Fin slider-->

            <!--Información del restaurante-->
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h1 id="nombre_restaurante">PikaTako</h1>
                    <!--Area de Calificación-->
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <!--Fin area de calificación-->

                    <p id="descripcion">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim, vel. Voluptates nulla aut impedit, in commodi sit, eum nam facere laboriosam ut praesentium aperiam nihil ipsam? Est, nemo aut? Tempore.</p>
                        
                    <div class="row">
                        <div class="col-sm-2">
                            <a href="#"><img width="40" height="40"  src="../../src/img/iconos/ubicacion.png"></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="#"><img width="40" height="40" src="../../src/img/iconos/tripadvisor.png"></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="#"><img width="40" height="40" src="../../src/img/iconos/facebook.png"></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="#"><img width="40" height="40" src="../../src/img/iconos/instagram.png"></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="#"><img width="40" height="40" src="../../src/img/iconos/galeria.png"></a>
                        </div>
                    </div>
                    <br>
                    
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>

                    <!--<ul>
                        <li><img width="40" height="40" src="../../src/img/iconos/facebook.png"> <img width="40" height="40" src="../../src/img/iconos/instagram.png"><img width="40" height="40" src="../../src/img/iconos/galeria.png"></li>
                        
                    </ul>-->
                </div>
            </div>
            <!--Fin información del restaurante-->
        </div>
        
        <br><br>
        <!--Redes Sociales-->
        <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Telefono</h4>
                        <p id="telefono">+01-3-8888-6868</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Dirección</h4>
                        <p id="direccion">60-49 Road 11378 New York</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Horarios</h4>
                        <p id="horarios">10:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Correo</h4>
                        <p id="correo">hello@colorlib.com</p>
                    </div>
                </div>
            </div>
            <!--Fin redes sociales-->

            <!--Sub menu-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Galeria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Menús y platillos</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h3>Fotos</h3>
                                    <!-- Gallery -->
                                    <div class="row mt-3">
                                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                            <img
                                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
                                            class="w-100 shadow-1-strong rounded mb-4"
                                            alt=""
                                            />

                                            <img
                                            src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg"
                                            class="w-100 shadow-1-strong rounded mb-4"
                                            alt=""
                                            />
                                        </div>

                                        <div class="col-lg-4 mb-4 mb-lg-0">
                                            <img
                                            src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg"
                                            class="w-100 shadow-1-strong rounded mb-4"
                                            alt=""
                                            />

                                            <img
                                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
                                            class="w-100 shadow-1-strong rounded mb-4"
                                            alt=""
                                            />
                                        </div>

                                        <div class="col-lg-4 mb-4 mb-lg-0">
                                            <img
                                            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                                            class="w-100 shadow-1-strong rounded mb-4"
                                            alt=""
                                            />

                                            <img
                                            src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg"
                                            class="w-100 shadow-1-strong rounded mb-4"
                                            alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">

                               

                                    <h3>Menú</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt at voluptate doloremque exercitationem, fugiat facilis reiciendis, pariatur recusandae repudiandae dignissimos vero. Odio, qui enim. Mollitia ad eum tempore cum voluptatibus?</p>
                                    <!-- Gallery -->
                                    <div class="row mt-3">
                                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                        <img
                                        src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
                                        class="w-100 shadow-1-strong rounded mb-4"
                                        alt=""
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Fin Submenu-->

    </div>
    <!--Fin contenido de la plantilla -->

    <br>
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>