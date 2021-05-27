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
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nombre del Restaurante<span>*</span></p>
                                        <input id="nombre" name="nombre" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Descripción Corta del Restaurante<span>*</span></p>
                                        <input id="desc_corta" name="desc_corta" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Descripción larga<span>*</span></p>
                                <textarea class="form-control" rows="3" id="desc_larga" name="desc_larga"></textarea>
                            </div>

                            <div class="checkout__input">
                                <p>Ubicacion<span>*</span></p>
                                <input type="text" placeholder="Estado" id="estado" name="estado" class="checkout__input__add">
                                <input type="text" placeholder="Municipio" id="municipio" name="municipio" class="checkout__input__add">
                                <input type="text" placeholder="Ciudad" id="ciudad" name="ciudad" class="checkout__input__add" >
                            </div>
                            <div class="checkout__input">
                                <p>Codigo Postal<span>*</span></p>
                                <input placeholder="Codigo Postal" id="cp" name="cp" type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telefono<span>*</span></p>
                                        <input placeholder="Telefono" id="telefono" name="telefono" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input placeholder="Correo Electronico" id="email" name="email" type="text">
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