<?php
include '../../inc/peticiones/login/sesion.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <?php
    include '../componentes/header.html';
    ?>

</head>

<body>

    <?php
    include '../componentes/head.html';

    ?>

    <!--contenido de la plantilla -->
    <!--contenido de la plantilla -->

    <!-- Barra de Imagen -->
    <section class="breadcrumb-section set-bg" data-setbg="../../src/img/fondo.jpeg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 id="nombre_restaurante">Editar Restaurante</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin Barra de Imagen -->
    <br>
    <div id="mensaje"></div>
    <div id="form_agregar_restaurante" class="container mb-5 mx-auto">
        <ul class="nav nav-pills secondary justify-content-center mb-5" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#info" role="tab" aria-controls="home" aria-selected="true">Información general</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#contacto" role="tab" aria-controls="profile" aria-selected="false">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ciudad" role="tab" aria-controls="contact" aria-selected="false">Ciudad</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#horario" role="tab" aria-controls="contact" aria-selected="false">Horario</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!--INFORMACIÓN GENERAL DEL RESTAURANTE-->
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <form id="form_agregar_restaurante" name="form_agregar_restaurante" action="#">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 mx-auto">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Nombre del Restaurante<span>*</span></p>
                                                <input id="nombre" name="nombre" type="text" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Descripción Corta del Restaurante<span>*</span></p>
                                                <input id="desc_corta" name="desc_corta" type="text" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="checkout__input">
                                        <p>Descripción larga<span>*</span></p>
                                        <textarea class="form-control" rows="3" id="desc_larga" name="desc_larga" required="required"></textarea>
                                    </div>

                                    <div class="checkout__input__checkbox">
                                        <label for="acc">
                                            ¿Cuenta con servicio a domicilio?
                                            <input type="checkbox" id="acc">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <br>
                                    <button type="submit" class="site-btn btn-block">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--INFORMACIÓN GENERAL DEL RESTAURANTE /-->
            <!--INFORMACION DE CONTACTO---->
            <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <form id="form_agregar_restaurante" name="form_agregar_restaurante" action="#">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 mx-auto">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Telefono<span>*</span></p>
                                                <input placeholder="Telefono" id="telefono" name="telefono" type="text" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Email<span>*</span></p>
                                                <input placeholder="Correo Electronico" id="email" name="email" type="text" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Facebook<span>*</span></p>
                                                <input placeholder="URL o link de Facebook" id="facebook" name="facebook" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Instagram<span>*</span></p>
                                                <input placeholder="URL o link de Instagram" id="instagram" name="instagram" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <button type="submit" class="site-btn btn-block">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--INFORMACION DE CONTACTO--/-->
            <!--INFORMACION DE LA CIUDAD-->
            <div class="tab-pane fade" id="ciudad" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <form id="form_agregar_restaurante" name="form_agregar_restaurante" action="#">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 mx-auto">
                                <div class="checkout__input">
                                    <div class="hero__search">
                                        <form id="eleccion_ciudad">
                                            <p>Selecciona tu ciudad:<span>*</span></p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select placeholder="Ciudad" class="custom-select" name="cbx" id="cbx"></select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <input placeholder="Dirección" id="direccion" name="direccion" type="text" class="checkout__input__add" required="required">

                                    <input placeholder="Codigo Postal" id="cp" name="cp" type="text" class="checkout__input__add" required="required">
                                </div>

                                    <br>
                                    <button type="submit" class="site-btn btn-block">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--INFORMACION DE LA CIUDAD--/-->
            <!--INFORMACION DEL HORARIO-->
            <div class="tab-pane fade" id="horario" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
                    <div class="col-md-12 mx-auto">
                        <form id="form_agregar_restaurante" name="form_agregar_restaurante" action="#">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 mx-auto">
                                    <div class="card text-center">
                                        <div class="card-header text-white bg-dark">
                                            <h6>Selecciona los dias habiles del restaurante</h6>
                                        </div>
                                        <div class="card-columns body">
                                            <div class="container" id="lista_lista">
                                                <div class="row row-cols-2 text-center">
                                                    <div class="col mx-auto">
                                                        <div class="form-check form-switch ">
                                                            <input class="form-check-input" type="checkbox" id="1">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault">Lunes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col mx-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="2" >
                                                            <label class="form-check-label" for="flexSwitchCheckDefault">Martes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="3" >
                                                            <label class="form-check-label" for="flexSwitchCheckDefault">Miercoles</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="4" >
                                                            <label class="form-check-label" for="flexSwitchCheckDefault">Jueves</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="5" >
                                                            <label class="form-check-label" for="flexSwitchCheckDefault">Viernes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="6" >
                                                            <label class="form-check-label" for="flexSwitchCheckDefault">Sabado</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="0" >
                                                            <label class="form-check-label" for="flexSwitchCheckDefault">Domingo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="checkout__input">
                                        <div class="row">
                                            <div class="col">
                                                <label> Horario Apertura</label>
                                                <input type="time" id="horario_abrir">
                                            </div>
                                            <div class="col">
                                                <label> Horario Cierre</label>
                                                <input type="time" id="horario_cerrar">
                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <button type="submit" class="site-btn btn-block">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--INFORMACIÓN DEL HORARIO--/-->
        </div>

    </div>
    


    <!--contenido de la plantilla -->
    <?php
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>

    <script src="../../inc/funciones/admin/editar_restaurante.js" type="module"></script>


</body>

</html>