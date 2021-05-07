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
                            <img width="40" height="40" src="../../src/img/iconos/ubicacion.png">
                        </div>
                        <div class="col-sm-2">
                            <img width="40" height="40" src="../../src/img/iconos/tripadvisor.png">
                        </div>
                        <div class="col-sm-2">
                            <img width="40" height="40" src="../../src/img/iconos/facebook.png">
                        </div>
                        <div class="col-sm-2">
                            <img width="40" height="40" src="../../src/img/iconos/instagram.png">
                        </div>
                        <div class="col-sm-2">
                            <img width="40" height="40" src="../../src/img/iconos/galeria.png">
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
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Promociones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Galeria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Ubicación</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h3>Promociones!</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, aperiam quidem commodi cupiditate porro consequuntur quo debitis sed at incidunt vitae hic, perspiciatis molestiae odio obcaecati maiores officiis. Eos, nulla.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h3>Fotos del restaurante!</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum libero voluptatum debitis, consectetur necessitatibus dolores veritatis officia deleniti inventore perferendis doloremque maxime, aliquid excepturi eveniet porro fugiat, quisquam asperiores at.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h3>Ubicación!</h3>
                                    <!-- Map Begin -->
                                    <div class="map">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
                                            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                        <div class="map-inside">
                                            <i class="icon_pin"></i>
                                            <div class="inside-widget">
                                                <h4>New York</h4>
                                                <ul>
                                                    <li>Telefono: +52-345-6789</li>
                                                    <li>Dirección: 16 Creek Ave. Farmingdale, NY</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Map End -->
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