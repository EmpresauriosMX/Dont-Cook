<!DOCTYPE html>
<html lang="es">

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
   <!--contenido de la plantilla -->

    <div class="container">
        <!-- Categories Section Begin -->
        <?php
            include '../../templates/componentes/categorias.html';
        ?>
        <!-- Categories Section End -->

        <!--RESTAURANTES-->
        <div class="section-title">
            <h2 id="titulo_restaurantes"> Todos los restaurantes</h2>
        </div>
        <div class="row" id="contenedor_restaurantes">

            
                <div class="card" style="max-width: 100%; max-height: 20%;">
                    <div class="row">
                        <div class="w-20">
                            <img
                                src="../../src/img/restaurants/pikalogodarkmode.png"
                                class="img-fluid"
                            />
                        </div>
                        
                        <div class="w-auto">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">NOMBRE RESTAURANTE</h5>
                                <p class="card-text font-weight-bolder">ABIERTO/ CERRADO </p> 
                                <p class="card-text text-info">Horario</p>
                                <p class="card-text">Taqueria - Carnitas - Jugos</p>
                                <div class="row">
                                    <div class="w-30 p-3">
                                        <button type="button" class="btn btn-outline-primary btn-sm disabled">
                                            <span>
                                                <img width="20px" height="20px" src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxsaW5lYXJHcmFkaWVudCBpZD0iU1ZHSURfMV8iIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMjU2IiB4Mj0iMjU2IiB5MT0iNTEyIiB5Mj0iMCI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmQ1OTAwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZmZkZTAwIi8+PC9saW5lYXJHcmFkaWVudD48Zz48Zz48cGF0aCBkPSJtMjU2IDBjLTE0MC45NTkgMC0yNTYgMTE1LjA0OS0yNTYgMjU2IDAgMTQwLjk1OSAxMTUuMDUgMjU2IDI1NiAyNTYgMTQwLjk2IDAgMjU2LTExNS4wNDkgMjU2LTI1NiAwLTE0MC45Ni0xMTUuMDQ5LTI1Ni0yNTYtMjU2em0wIDQ4MmMtMTI0LjYxNyAwLTIyNi0xMDEuMzgzLTIyNi0yMjZzMTAxLjM4My0yMjYgMjI2LTIyNiAyMjYgMTAxLjM4MyAyMjYgMjI2LTEwMS4zODMgMjI2LTIyNiAyMjZ6bTE0NC44MTUtMjg3LjE5Ny05MC43NzEtMTMuMTktNDAuNTk0LTgyLjI1MmMtMi41MjYtNS4xMi03Ljc0MS04LjM2MS0xMy40NS04LjM2MXMtMTAuOTI0IDMuMjQxLTEzLjQ1MSA4LjM2MmwtNDAuNTk0IDgyLjI1Mi05MC43NzEgMTMuMTljLTUuNjUuODIxLTEwLjM0NSA0Ljc3OS0xMi4xMDkgMTAuMjA5cy0uMjkyIDExLjM5MSAzLjc5NiAxNS4zNzZsNjUuNjgzIDY0LjAyNC0xNS41MDYgOTAuNDA0Yy0uOTY1IDUuNjI3IDEuMzQ4IDExLjMxNSA1Ljk2NyAxNC42NzEgNC42MiAzLjM1NiAxMC43NDMgMy43OTkgMTUuNzk3IDEuMTQybDgxLjE4OC00Mi42ODMgODEuMTg4IDQyLjY4M2M1LjA5NSAyLjY3OCAxMS4yMTUgMi4xODggMTUuNzk3LTEuMTQyIDQuNjE5LTMuMzU2IDYuOTMzLTkuMDQzIDUuOTY4LTE0LjY3MWwtMTUuNTA2LTkwLjQwNCA2NS42ODItNjQuMDI0YzQuMDg5LTMuOTg1IDUuNTYxLTkuOTQ2IDMuNzk2LTE1LjM3NnMtNi40NTktOS4zODgtMTIuMTEtMTAuMjF6bS04My45NTYgNzMuNjMyYy0zLjUzNiAzLjQ0Ni01LjE0OSA4LjQxMS00LjMxNCAxMy4yNzdsMTEuNzAxIDY4LjIyLTYxLjI2Ni0zMi4yMDljLTIuMTg1LTEuMTQ5LTQuNTgzLTEuNzIzLTYuOTgtMS43MjNzLTQuNzk1LjU3NC02Ljk4IDEuNzIzbC02MS4yNjYgMzIuMjA5IDExLjcwMS02OC4yMmMuODM0LTQuODY2LS43NzktOS44MzEtNC4zMTQtMTMuMjc3bC00OS41NjUtNDguMzE0IDY4LjQ5OC05Ljk1M2M0Ljg4NS0uNzEgOS4xMDktMy43NzggMTEuMjk0LTguMjA2bDMwLjYzMi02Mi4wNjkgMzAuNjMzIDYyLjA2OWMyLjE4NSA0LjQyNyA2LjQwOCA3LjQ5NiAxMS4yOTQgOC4yMDZsNjguNDk3IDkuOTUzeiIgZmlsbD0idXJsKCNTVkdJRF8xXykiLz48L2c+PC9nPjwvc3ZnPg==" />
                                            </span>
                                            Calificación
                                        </button>
                                    </div>
                                    <div class="w-30 p-3">
                                        <button type="button" class="btn btn-outline-primary btn-sm disabled">Para llevar</button>
                                    </div>
                                    <div class="w-30 p-3">
                                        <button type="button" class="btn btn-outline-primary btn-sm disabled">
                                            <span>
                                            <img width="20px" height="20px" src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjQ2NHB0IiB2aWV3Qm94PSIwIC0yMCA0NjQgNDY0IiB3aWR0aD0iNDY0cHQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0ibTM0MCAwYy00NC43NzM0MzguMDAzOTA2MjUtODYuMDY2NDA2IDI0LjE2NDA2Mi0xMDggNjMuMTk5MjE5LTIxLjkzMzU5NC0zOS4wMzUxNTctNjMuMjI2NTYyLTYzLjE5NTMxMjc1LTEwOC02My4xOTkyMTktNjguNDgwNDY5IDAtMTI0IDYzLjUxOTUzMS0xMjQgMTMyIDAgMTcyIDIzMiAyOTIgMjMyIDI5MnMyMzItMTIwIDIzMi0yOTJjMC02OC40ODA0NjktNTUuNTE5NTMxLTEzMi0xMjQtMTMyem0wIDAiIGZpbGw9IiNmZjYyNDMiLz48cGF0aCBkPSJtMzIgMTMyYzAtNjMuMzU5Mzc1IDQ3LjU1MDc4MS0xMjIuMzU5Mzc1IDEwOC44OTQ1MzEtMTMwLjg0NzY1Ni01LjU5NzY1Ni0uNzY5NTMyLTExLjI0MjE4Ny0xLjE1NjI1MDI1LTE2Ljg5NDUzMS0xLjE1MjM0NC02OC40ODA0NjkgMC0xMjQgNjMuNTE5NTMxLTEyNCAxMzIgMCAxNzIgMjMyIDI5MiAyMzIgMjkyczYtMy4xMTMyODEgMTYtOC45OTIxODhjLTUyLjQxNDA2Mi0zMC44MjQyMTgtMjE2LTEzOC41NTg1OTMtMjE2LTI4My4wMDc4MTJ6bTAgMCIgZmlsbD0iI2ZmNTAyMyIvPjwvc3ZnPg==" />
                                            </span>
                                            Favorito
                                        </button>
                                    </div>
                                </div>
                                <p class="font-italic">Ubicación</p>
                                <p class="card-text"><small class="text-muted">DESCRIOPCION CORTA</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            
        
            
           

            <!--

            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="">
                    <img src="../../src/img/restaurantes/${imagen}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Lorem ipsum dolor sit amet consectetur!</a></h6>
                        <h5>NOMBRE RESTAURANTE</h5>
                    </div>
                </div>
            </div>
            -->
            

        </div>
        


        
    </div>



<!--contenido de la plantilla 
<script src="../../inc/funciones/restaurantes/app.js" type="module"></script>

-->

    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>