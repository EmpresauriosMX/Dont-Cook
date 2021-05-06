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

    <div class="container mb-5">
        <h2>el contenido va aqui</h2>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                <img src="../../src/img/restaurants/pikalogodarkmode.png" class="card-img" alt="...">
                <div class="card-img-overlay" >
                    <h5 class="card-title">Restaurante</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut excepturi corporis iste itaque nesciunt illum eligendi suscipit, nihil voluptates provident quis voluptas voluptatibus culpa saepe velit dolorem, veniam a? At!</p>
                    <p class="card-text">Last updated 3 mins ago</p>
                    <button class="btn btn-success">visitar</button>
                </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        
    </div>

    

<!--contenido de la plantilla -->
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
   
</body>

</html>