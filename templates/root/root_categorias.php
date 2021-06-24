<?php
    include '../../inc/peticiones/login/sesion.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php 
    include '../componentes/header.html';
    ?>
</head>
<body>
   <?php
   include '../componentes/menu_admin.html';

   ?>
   <!--contenido de la plantilla -->

<form id="form_agregar" name="form_agregar" action="">
    <div class="container">
        <div class="card border-success mt-5 mb-3">
            <div class="card-header text-center">Agregar Nueva Categoria</div>
            <div class="card-body text-success">
                <h5 class="card-title">Nombre Categoria</h5>
                <input type="text" id="nombre" name="nombre" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                <h5 class="card-title">Imagen</h5>
                <input type="file" class="custom-file-input" id="imagen" lang="es" accept=".png,.jpg">
                <button type="submit" class="btn btn-outline-success">Guardar</button>
            </div>
        </div>
    </div>
</form>
    

<form id="form_categoria" name="form_categoria" action="">
    <div class="container mt-5">
        <div class="card-columns">
            <div class="card">
                <img class="card-img-top" src="../../src/img/categories/carritos.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre Categoria</h5>
                    <button class="btn btn-dark btn-lg btn-block">Editar</button> 
                    <button class="btn btn-danger btn-lg btn-block">Eliminar</button>    
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="../../src/img/categories/domicilio.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre Categoria</h5>
                    <button class="btn btn-dark btn-lg btn-block">Editar</button> 
                    <button class="btn btn-danger btn-lg btn-block">Eliminar</button>    
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="../../src/img/categories/tacos.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre Categoria</h5>
                    <button class="btn btn-dark btn-lg btn-block">Editar</button> 
                    <button class="btn btn-danger btn-lg btn-block">Eliminar</button>    
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="../../src/img/categories/fast_food.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre Categoria</h5>
                    <button class="btn btn-dark btn-lg btn-block">Editar</button> 
                    <button class="btn btn-danger btn-lg btn-block">Eliminar</button>    
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="../../src/img/categories/pizza.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre Categoria</h5>
                    <button class="btn btn-dark btn-lg btn-block">Editar</button> 
                    <button class="btn btn-danger btn-lg btn-block">Eliminar</button>    
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="../../src/img/categories/fondo.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre Categoria</h5>
                    <button class="btn btn-dark btn-lg btn-block">Editar</button> 
                    <button class="btn btn-danger btn-lg btn-block">Eliminar</button>    
                </div>
            </div>
            
            
        </div>
   </div>
</form>
   
   


    <!--contenido de la plantilla -->
    <?php 
        
        include '../componentes/scripts.html';
    ?>
</body>

<footer>
    <script src="../../inc/funciones/root/app.js" type="module"></script>
</footer>

</html>