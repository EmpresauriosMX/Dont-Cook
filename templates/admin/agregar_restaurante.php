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
        include '../componentes/sesiones.php';
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

                            <div class="checkout__input">
                                <p>Logotipo del restaurante<span>*</span></p>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" lang="es">
                                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                </div>
                                <br>
                            </div>


                            <!--
                            <div class="checkout__input">
                                <p>Ubicacion<span>*</span></p>
                                <input type="text" placeholder="Estado" id="estado" name="estado" class="checkout__input__add" required="required">
                                <input type="text" placeholder="Municipio" id="municipio" name="municipio" class="checkout__input__add" required="required">
                                <input type="text" placeholder="Ciudad" id="ciudad" name="ciudad" class="checkout__input__add" required="required">
                            </div>
                            -->
                            

                            <div class="checkout__input">
                                <div class="hero__search">
                                    <form id="eleccion_ciudad">
                                        <p>Selecciona tu ciudad:<span>*</span></p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select placeholder="Ciudad" class="custom-select" name="cbx" id="cbx" ></select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <input  placeholder="Dirección" id="direccion" name="direccion" type="text" class="checkout__input__add" required="required">
                                
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

                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    ¿Cuenta con servicio a domicilio?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Horario del restaurante<span>*</span></p>
                            </div>


                            <div class="card text-center">
                                <div class="card-header text-white bg-dark">
                                <h6>Selecciona los dias habiles del restaurante</h6>
                                </div>
                                <div class="card-columns body">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Lunes</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Martes</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Miercoles</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Jueves</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Viernes</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Sabado</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Domingo</label>
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                            <div class="checkout__input">
                                <input  placeholder="Horario" id="horarios" name="horarios" type="text" required="required">
                            </div>

                            <?php
                                include '../componentes/etiquetas.html';
                            ?>

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