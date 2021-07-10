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
                        <h2 id="nombre_restaurante">Agregar Restaurante</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin Barra de Imagen -->
    <br>



    <div class="container mb-5 mx-auto ">

        <form id="form_agregar_restaurante" name="form_agregar_restaurante" action="#">
            <div class="row">
                <div class="col-lg-8 col-md-6 mx-auto">
                    
                    <div class="checkout__input text-center">
                        <h3 class="h3">Información del Restaurante<span>*</span></h3>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/restaurante.png" alt=""></span>
                            </div>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required="required">
                        </div>

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/formato.png" alt=""></span>
                            </div>
                            <input type="text" id="desc_corta" name="desc_corta" class="form-control" placeholder="Descripción Corta del Restaurante" aria-label="Descripción Corta" aria-describedby="basic-addon1" required="required">
                        </div>

                    </div>
                        

                    <div class="checkout__input">
                        <!--<p>Descripción larga<span>*</span></p>-->
                        <textarea class="form-control" rows="3" id="desc_larga" name="desc_larga" placeholder="Escribe aquí la mejor descripción de tu restaurante! (¿Qué preparas?, ¿Qué tipo de comida sirves?, ¿Cuál es tu fuerte?, etc..)" aria-label="Descripción Corta" aria-describedby="basic-addon1" required="required"></textarea>
                    </div>

                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/imagen.png" alt=""></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="imagen" lang="es" accept=".png,.jpg">
                            <label class="custom-file-label" for="customFileLang">Selecciona el archivo de tu logotipo (.png, .jpg, .jpeg)</label>
                        </div>                    
                    </div>

                    <div class="checkout__input">
                        <h6 class="h6">Selecciona la ciudad en la que se encuentra<span>*</span></h6>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/edificios.png" alt=""></span>
                        </div>
                        <form id="eleccion_ciudad">  
                            <select placeholder="Ciudad" class="custom-select" name="cbx" id="cbx"></select>
                        </form> 
                    </div>

                    <div class="row">

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/mapa.png" alt=""></span>
                            </div>
                            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" aria-label="Dirección" aria-describedby="basic-addon1" required="required">
                        </div>

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/codigo.png" alt=""></span>
                            </div>
                            <input type="text" id="cp" name="cp" class="form-control" placeholder="Codigo Postal" aria-label="Codigo Postal" aria-describedby="basic-addon1" required="required">
                        </div>

                    </div>


                    <div class="checkout__input text-center">
                        <h3 class="h3">Información de Contacto<span>*</span></h3>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/telefono.png" alt=""></span>
                            </div>
                            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Numero de Telefono (999-999-9999)" aria-label="Telefono" aria-describedby="basic-addon1" required="required">
                        </div>

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/correo.png" alt=""></span>
                            </div>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Correo electronico" aria-label="Correo" aria-describedby="basic-addon1" required="required">
                        </div>

                    </div>

                    
                    <div class="row">

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/facebook.png" alt=""></span>
                            </div>
                            <input type="text" placeholder="URL o link de Facebook" id="facebook" name="facebook" class="form-control" aria-label="facebook" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/instagram.png" alt=""></span>
                            </div>
                            <input type="text" placeholder="URL o link de Instagram" id="instagram" name="instagram" class="form-control"  aria-label="instagram" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    

                    <div class="checkout__input text-center">
                        <h3 class="h3">Información Extra<span>*</span></h3>
                    </div>

                    

                    <div class="card text-center">
                        <div class="card-header text-white bg-dark">
                            <h6>Selecciona los dias habiles del restaurante</h6>
                        </div>
                        <div class="card-columns body">
                            <div class="container" id="lista_lista">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <div class="form-check form-switch ">
                                            <input class="form-check-input" type="checkbox" id="1">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Lunes</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="2">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Martes</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="3">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Miercoles</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="4">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Jueves</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="5">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Viernes</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="6">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Sabado</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="0">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Domingo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/abierto.png" alt=""></span>
                            </div>
                            <input type="time" id="horario_abrir">
                        </div>

                        <div class="col-lg-6 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/cerrado.png" alt=""></span>
                            </div>
                            <input type="time" id="horario_cerrar">
                        </div>

                    </div>

                    <div class="checkout__input__checkbox">
                        <label for="acc">
                            <h5 class="h5">¿Cuentas con servicio a domicilio?<span>*</span></h5>
                            <input type="checkbox" id="acc">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="checkout__input text-center">
                        <h3 class="h3">Categorias de tu restaurante<span>*</span></h3>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <form id="" name="" action="#">
                                <div class="row">
                                    <div class="col-lg">
                                        <!--LUIS WE AQUI PON LO DE LAS CATEGORIAS-->
                                        <div class="checkout__input">
                                            <div class="hero__search">
                                                <form id="">
                                                    <div class="row">
                                                        <div class="col-md-12 mx-auto">
                                                            <h5 class="h5">Selecciona las categorias en las que entra tu restaurante!<span>*</span></h5>
                                                            <div class="input-group mb-3">
                                                                <select placeholder="Ciudad" class="custom-select" name="cbx_categoria" id="cbx_categoria"></select>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-dark" type="button" id="boton_agregar_categoria">Agregar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--AQUI SE VAN A IMPRIMIR LAS CATEGORIAS-->
                                                        <input type="hidden" class="close">
                                                        <div class="card text-center mt-3">
                                                            <div class="card-header text-white bg-dark">
                                                                <h6>Mis categorias seleccionadas</h6>
                                                            </div>
                                                            <div class="body mt-3">
                                                                <div class="container">
                                                                    <div class="row" id="contenedor_categorias">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="site-btn btn-block">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container mb-5 mx-auto">


    </div>



    <!--contenido de la plantilla -->
    <?php
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>

    <script src="../../inc/funciones/admin/ag_restaurante.js" type="module"></script>


</body>

</html>


<!--<div class="row">

                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Nombre del Restaurante<span>*</span></p>
                                <input id="nombre" placeholder="Nombre" name="nombre" type="text" required="required">
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
                        <p>Logotipo del restaurante<span>*</span></p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imagen" lang="es" accept=".png,.jpg">
                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        </div>
                        <br>
                    </div>

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


                        <div class="checkout__input">
                        
                        <input placeholder="Dirección" id="direccion" name="direccion" type="text" class="checkout__input__add" required="required">

                        <input placeholder="Codigo Postal" id="cp" name="cp" type="text" class="checkout__input__add" required="required">
                    </div>


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

                    -->


<!--
                    <div class="checkout__input">
                        <p>Ubicacion<span>*</span></p>
                        <input type="text" placeholder="Estado" id="estado" name="estado" class="checkout__input__add" required="required">
                        <input type="text" placeholder="Municipio" id="municipio" name="municipio" class="checkout__input__add" required="required">
                        <input type="text" placeholder="Ciudad" id="ciudad" name="ciudad" class="checkout__input__add" required="required">
                    </div>
                    -->