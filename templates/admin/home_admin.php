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
    ?>

   <!--contenido de la plantilla -->
   <!--contenido de la plantilla -->

    <div class="container mb-5">
        <h2>Mis restaurantes</h2>
        <div class="row mt-3">
            <div class="col-md-7">
                
                <div class="card bg-dark text-white">
                    <img src="../../src/img/restaurants/pikalogodarkmode.png" class="card-img" alt="...">
                    <div class="card-img-overlay" >
                        <h5 class="card-title">Restaurante</h5>
                        <p class="card-text"></p>
                        <div class="d-none d-sm-none d-md-block">descripción larga para escritorio. Este texto solo visible para escritorio</div>
                        <div class="d-block d-sm-block d-md-none">Descripción corta para celulares. Este texto solo visible para smartphone</div>
                        <p class="card-text">Last updated 3 mins ago</p>
                        <button class="btn btn-success">visitar</button>
                    </div>
                </div>
            </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <h5>Vista general</h5>  
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