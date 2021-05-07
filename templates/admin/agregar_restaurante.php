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
        include '../componentes/menu_admin.html';
        include '../componentes/head.html';
    ?>

   <!--contenido de la plantilla -->
   <!--contenido de la plantilla -->

    <div class="container mb-5 mx-auto ">
        <div class=" mx-auto">
            <h4 class="mt-2 mb-2">Agregar restaurante</h4>
        </div>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 mx-auto">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nombre<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Descripción corta<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Descripción larga<span>*</span></p>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                            <div class="checkout__input">
                                <p>Ubicacion<span>*</span></p>
                                <input type="text" placeholder="Estado" class="checkout__input__add">
                                <input type="text" placeholder="Municipio" class="checkout__input__add">
                                <input type="text" placeholder="Ciudad">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telefono<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
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
                            <button type="submit" class="site-btn btn-block">Guardar</button>
                        </div>
                    </div>
                </form> 
    </div>

    

<!--contenido de la plantilla -->
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
   
</body>

</html>