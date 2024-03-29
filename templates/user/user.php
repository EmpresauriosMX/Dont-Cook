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
            font-size: 14px;
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
            font-size: 14px; 
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
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="section-title mt-3">
                    <h2>Mi Perfil</h2>        
                </div>
                <!--En caso de no tener usuario-->
                <div id="mensaje"></div>
                <!--En caso de tener usuario-->
                <div id="user_card"></div>
            </div>
            <!---CARTA DE LA CIUDAD-->
            <div class="col-md-4 col-sm-12">
                <div class="section-title mt-3">
                    <h2>Mi ciudad</h2>        
                </div>
                <div class="col-sm-12 col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header ">
                            <h5 class="card_tittle text-center">Configuración de localidad</h5>
                        </div>
                        <form class="mx-auto mt-3 "id="eleccion_ciudad">
                            <div class="input-group mb-3">
                                <select class="custom-select " name="cbx" id="cbx">
                                </select>
                                <div class="input-group-append">
                                    <button id="enviar" name="enviar" value="Guardar" class="btn btn-dark" type="button">Guardar</button>
                                </div>
                            </div>
                                <!--<input type="submit" id="enviar" name="enviar" value="Guardar" />-->
                        </form>
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
    <script src="../../inc/funciones/user/app.js" type="module"></script>
</body>

</html>