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
        <div id="contenedor_restaurantes">
            
        <?php
            include '../componentes/tarjeta_restaurante.html';
        ?>
        <!--
            <div class="blog-card alt col-md-6">
                <div class="meta">
                    <div class="photo" style="background-image: url(data:image/jpeg;base64,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)"></div>
                    <ul class="details">
                        <li class="author"><a href="#">Correo@mail.com</a></li>
                        <li class="tags">
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Twitter</a></li>
                        </ul>
                        </li>
                    </ul>
                </div>
                <div class="description">
                    <h1>Nombre Restaurante</h1>
                    <h2>Abierto / Cerrado</h2>
                    <p class="card-text text-info">Horario</p>
                    <p class="card-text">Telefono</p>
                    <p class="card-text"><small class="text-muted">DESCRIOPCION CORTA</small></p>
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

                        </div>
                    <p class="font-italic">Ubicación</p>
                    <p class="read-more">
                        <a href="#">Visitar</a>
                    </p>
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

        <!--
    <div class="card">
        <div class="row no-gutters">
            <div class="col-ms-4">
            <img src="../../src/img/restaurants/pikalogodarkmode.png" class="card-img">
            </div>
            <div class="col-ms-8">
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
    -->