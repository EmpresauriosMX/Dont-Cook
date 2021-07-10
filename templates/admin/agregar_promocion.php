<?php
  include '../../inc/peticiones/login/sesion.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

  <?php
  include '../componentes/header.html';
  ?>
</head>

<body>
  <?php
  include '../componentes/head.html';

  ?>

  <!-- Barra de Imagen -->
  <section class="breadcrumb-section set-bg" data-setbg="../../src/img/fondo.jpeg">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="breadcrumb__text">
                      <h2 id="nombre_restaurante">Agregar Nueva Promoción</h2>
                  </div>
              </div>
          </div>
      </div>
  </section>
    <!-- Fin Barra de Imagen -->

  <!--contenido de la plantilla -->
  <div class="container mb-5">
    <br>
    <div class="row">

      <div class="col-lg-8 col-md-6 mx-auto">
        <form id="demo-form" data-parsley-validate>

          <div class="checkout__input text-center">
              <h3 class="h3">Información de la promoción<span></span></h3>
          </div>

          <div class="row">

            <div class="col-lg-5 input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/promocion.png" alt=""></span>
                </div>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nombre de la Promoción (2x1 con Don'tCook!)" aria-label="Nombre" aria-describedby="basic-addon1" required="required">
            </div>

            <div class="col-lg-7 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/imagen.png" alt=""></span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="formFile" lang="es" accept=".png,.jpg">
                    <label class="custom-file-label" for="customFileLang">Imagen que representa tu promoción!(.png, .jpg)</label>
                </div>                    
            </div>

          </div>

          <div class="checkout__input">
              <textarea rows="3" id="message" required="required" class="form-control" name="message" data-parsley-minlength="20" data-parsley-maxlength="100" placeholder="Escribe aqui la descripción de tu promoción! (¿Qué tipo de promoción es?, ¿Qué ofreces?, ¿Hay restricciones?, etc...). Recuerda que debe llevar 20 caracteres mínimo y 100 máximo!" aria-label="Descripción Corta" aria-describedby="basic-addon1" required="required"></textarea>
          </div>


          <div class="card text-center">
            <div class="card-header text-white bg-dark">
                <h6 class="h6">Selecciona los dias hábiles de la promoción</h6>
            </div>
            <div class="card-columns body">
                <div class="container" id="lista_lista">
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-check form-switch ">
                                <input class="form-check-input" type="checkbox" id="lunes" value="1">
                                <input type="hidden" class="form-control" id="id_lunes">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Lunes</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="martes" value="2">
                                <input type="hidden" class="form-control" id="id_martes">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Martes</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="miercoles" value="3">
                                <input type="hidden" class="form-control" id="id_miercoles">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Miercoles</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="jueves" value="4">
                                <input type="hidden" class="form-control" id="id_jueves">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Jueves</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="viernes" value="5">
                                <input type="hidden" class="form-control" id="id_viernes">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Viernes</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sabado" value="6">
                                <input type="hidden" class="form-control" id="id_sabado">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Sabado</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="domingo" value="7">
                                <input type="hidden" class="form-control" id="id_domingo">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Domingo</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sabado" value="6">
                                <input type="hidden" class="form-control" id="todos" value="8">
                                <input type="hidden" class="form-control" id="id_todos">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Toda la Semana</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          
          <br>
          
          <div class="checkout__input text-center">
              <h3 class="h3">Fechas de disponibilidad<span></span></h3>
              <h5 class="h5">(Inicio/Final)<span></span></h5>
          </div>


          <div class="row">

              <div class="col-lg-6 input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/calendario.png" alt=""></span>
                  </div>
                  <input type="date" id="reservation-time1" name="reservation-time1" class="form-control" aria-label="fecha1" aria-describedby="basic-addon1" required="required">
              </div>

              <div class="col-lg-6 input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/calendariofin.png" alt=""></span>
                  </div>
                  <input type="date" id="reservation-time2" name="reservation-time2" class="form-control" aria-label="fecha2" aria-describedby="basic-addon1" required="required">
              </div>

          </div>

          <div class="checkout__input text-center">
              <h3 class="h3">Horarios de disponibilidad<span></span></h3>
              <h5 class="h5">(Inicio/Final)<span></span></h5>
          </div>

          <div class="row">

            <div class="col-lg-6 input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/abierto.png" alt=""></span>
                </div>
                <input type="time" id="horario_inicio">
            </div>

            <div class="col-lg-6 input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><img style="height: 20px;" src="../../src/img/iconos/cerrado.png" alt=""></span>
                </div>
                <input type="time" id="horario_conclusion">
            </div>

          </div>


          <button type="submit" id="btn" class="site-btn btn-block">Guardar Promoción</button>


        </form>
      </div>

    </div>

  </div>
  <!--contenido de la plantilla -->
  <?php
  include '../componentes/footer.html';
  include '../componentes/scripts.html';
  ?>
  <script src="../../inc/funciones/admin/agregar_promocion.js" type="module"></script>
</body>

</html>

