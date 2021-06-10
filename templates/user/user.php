<!DOCTYPE html>
<html lang="es">

<head>
    <?php 
    include '../componentes/header.html';
    ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../src/css/user.css" type="text/css">
    <style>
        
            #card {
            background: #ffa04b;
            margin: 2em auto;
            padding-bottom: 1em;
            border-radius: 2px;
            -webkit-box-shadow: 0px 3px 13px 0px rgba(0, 0, 0, 0.24);
            -moz-box-shadow: 0px 3px 13px 0px rgba(0, 0, 0, 0.24);
            box-shadow: 0px 3px 13px 0px rgba(0, 0, 0, 0.24);
            }

            #userImage {
            position: relative;
            top: 1em;
            display: block;
            text-align: center;
            margin: 1em auto;
            max-width: 100px;
            border-radius: 100%;
            }

            #playerName {
            position: relative;
            top: -15px;
            text-align: center;
            font-size: 20px;
            color: #fff;
            font-weight: bolder;
            }

            #states {
            width: 85%;
            margin: 1em auto;
            font-weight: 300;
            }

            #values li:hover {
            color: #555;
            cursor: pointer;
            text-decoration: underline;
            
            }

            .info {
                padding-bottom: 1em;
            list-style: none;
            position: relative;
            float: left;
            margin-left: 0;
            text-align: left;
            color: #fff;
            margin-bottom: 8px;
            padding: 1px 0px 8px 0px;
            border-bottom: 1px solid #ffac63;
            }

            .values {
                padding-bottom: 1em;
            list-style: none;
            position: relative;
            text-align: right;
            color: #fff;
            margin-bottom: 8px;
            padding: 1px 0px 8px 0px;
            border-bottom: 1px solid #ffac63;   
            }

    </style>
</head>
<body>
<?php
    include '../componentes/head.html';
    include '../componentes/navegacion_reducido.html';
?>
    <!--contenido de la plantilla -->
    <div class="container">
        

        
        <div class="section-title">
            <h2>Cuenta de usuario</h2>        
        </div>
        <!--USER CARD-->
        <div class="col-md-5 col-sm-12" id='card'>
            <img alt='user-image' id='userImage' src='https://randomuser.me/api/portraits/men/62.jpg'>
            <br>
            <h4 id='playerName'>sn4ever</h4>
            <div id='states'>
                <ul class='info'>
                    <li>
                        Correo
                    </li>
                    <li>
                        Edad
                    </li>
                    <li>
                        Ubicación
                    </li>
                    
                </ul>
                <ul class='values'>
                    <li>mi_correo@email.com</li>
                    <li>20</li>
                    <li>Cancún</li>
                </ul>
            </div>
                <form id="eleccion_ciudad">
                    <div class="input-group mb-3">
                        <select class="custom-select" name="cbx" id="cbx">
                            <option value="">Selecciona una ciudad</option>
                        </select>
                        <div class="input-group-append">
                            <button id="enviar" name="enviar" value="Guardar" class="btn btn-dark" type="button">Guardar</button>
                        </div>
                    </div>
                        <!--<input type="submit" id="enviar" name="enviar" value="Guardar" />-->
                </form>
            <div class=" mx-auto">
                <a href='#' class='btn btn-dark '>
                    <i class='fa fa-edit'></i>
                    Editar
                </a>
                <a href='../../inc/peticiones/login/logout.php' class='btn btn-danger'>
                    <i class='fa fa-sign-out'></i>
                    Salir
                </a>
            </div>
            
        </div>

        <!---EN CASO DE QUE NO CUENTE CON UNA CUENTA -->
        <?php
            include '../pages/sin_cuenta.html';
        ?>
        <!---EN CASO DE QUE SI TENGA UNA CUENTA-->



        <!---AQUI VA LO DE CONFIGURACIÓN DE USUARIO-->

        <!---AQUI VA LO DE CONFIGURACIÓN DE USUARIO /-->


    </div>
    <!--contenido de la plantilla -->
    <?php 
    include '../componentes/footer.html';
    include '../componentes/scripts.html';
    ?>
</body>

</html>