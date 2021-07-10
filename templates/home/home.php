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
    <!--Todo de home-->
    <section class="categories ">
        <div class="container">
        <?php
            include '../../templates/componentes/categorias.html';
        ?>
            <div id="mensaje" class="mt-3"></div>


            <!--Tarjetas de promociones-->
            <div id="titulo_promociones" class="section-title mt-3">
                <h2>Promociones de Hoy!</h2>
            </div>
            <div id="promociones" class="card-columns">
                <!--Tarjeta de Base-->
                <div class="card">
                    <img class="card-img-top" src="../../src/img/banner/banner-1.jpg" alt="Card image cap">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Restaurante</h4>
                    </div>
                    <div class="card-body">
                    <h6>Nombre de la Promoción</h6>
                    <p class="card-text">Descripción de la promocion... <br>
                        Chelas 2x1 xdxd <br>
                        De Lunes a Jueves <br>
                        Con Horario de 12:00 a 16:00</p>
                    </div>
                    <!--<div class="card-footer bg-danger">
                        <ul class="text-center">
                            <a href="#"><img width="30" height="30"  src="../../src/img/iconos/ubicacion.png"></a>
                            <a href="#"><img width="30" height="30" src="../../src/img/iconos/tripadvisor.png"></a>
                            <a href="#"><img width="30" height="30" src="../../src/img/iconos/facebook.png"></a>
                            <a href="#"><img width="30" height="30" src="../../src/img/iconos/instagram.png"></a>
                            <a href="#"><img width="30" height="30" src="../../src/img/iconos/galeria.png"></a>
                        </ul>
                    </div>-->
                </div>
                <!--Fin tarjeta de Base-->

                <div class="card">
                    <img class="card-img-top" src="../../src/img/banner/banner-2.jpg" alt="Card image cap">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Restaurante</h4>
                    </div>
                    <div class="card-body">
                    <h6>Nombre de la Promoción</h6>
                    <p class="card-text">Descripción de la promocion... <br>
                        Chelas 2x1 xdxd <br>
                        De Lunes a Jueves <br>
                        Con Horario de 12:00 a 16:00</p>
                    </div>
                </div>

                <div class="card">
                    <img class="card-img-top" src="../../src/img/banner/banner_dc.png" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h4 class="card-title">Restaurante</h4>
                    </div>
                    <div class="card-body">
                    <h6>Nombre de la Promoción</h6>
                    <p class="card-text">Descripción de la promocion... <br>
                        Chelas 2x1 xdxd <br>
                        De Lunes a Jueves <br>
                        Con Horario de 12:00 a 16:00</p>
                    </div>
                </div>
                
                <div class="card">
                    <img class="card-img-top" src="../../src/img/banner/banner_dc2.png" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h4 class="card-title">Restaurante</h4>
                    </div>
                    <div class="card-body">
                    <h6>Nombre de la Promoción</h6>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>

                <div class="card">
                    <img class="card-img-top" src="../../src/img/banner/banner_dc6.png" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h4 class="card-title">Restaurante</h4>
                    </div>
                    <div class="card-body">
                    <h6>Nombre de la Promoción</h6>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo reprehenderit necessitatibus cumque non cupiditate, odio commodi eveniet modi tenetur! Quis rem perspiciatis enim nesciunt deleniti doloremque libero aut quo natus.</p>
                    </div>
                </div>

                <div class="card">
                    <img class="card-img-top" src="../../src/img/banner/banner_dc4.png" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h4 class="card-title">Restaurante</h4>
                    </div>
                    <div class="card-body">
                    <h6>Nombre de la Promoción</h6>
                    <p class="card-text">Descripción de la promocion... <br>
                        Chelas 2x1 xdxd <br>
                        De Lunes a Jueves <br>
                        Con Horario de 12:00 a 16:00</p>
                    </div>
                </div>
            </div>
            <!--Fin de tarjetas de promociones-->

            <!--RESTAURANTES-->
            <div id="titulo_restaurantes" class="section-title mt-3">
                <h2>Todos los restaurantes</h2>
            </div>

            <div class="row mx-auto"  id="contenedor_restaurantes">
            </div>

            
            <!--FIN RESTAURANTES-->

            
        </div>
    </section>
    <!--Fin de todo de home-->
<!--contenido de la plantilla -->
    <script src="../../inc/funciones/home/home.js" type="module"></script>
    <!--script src="../../inc/funciones/home/categorias.js" type="module"></script-->
    <!--script src="../../inc/funciones/restaurantes/app.js" type="module"></script-->

    <?php 
    include '../../templates/componentes/footer.html';
    include '../../templates/componentes/scripts.html';
    ?>
</body>

</html>


<!--

<div id="restaurantes" class="row mt-3">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="../../src/img/restaurants/pikalogodarkmode.png">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="../admin/restaurante_ver.php"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">pequeña descripción</a></h6>
                            <h5>Restaurante</h5>
                        </div>
                    </div>
                </div>
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


-->