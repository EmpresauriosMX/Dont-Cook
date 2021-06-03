
<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php
  include '../componentes/header.html';
  ?>
</head>

<body>
  <?php
  include '../componentes/head.html';
  include '../componentes/sesiones.php';

  ?>

  <!--contenido de la plantilla -->
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-4">
        <img src="../../src/img/fondo.jpeg" alt="..." class="img-thumbnail">
      </div>
      <div class="col-md-4">
        <form class="row g-3">

          <div class="col-12">
            <div class="x_panel">
              <div class="x_content">

                <!-- start form for validation -->
                <form id="demo-form" data-parsley-validate>
                  <label for="fullname">nombre de la promocion * :</label>
                  <input type="text" id="fullname" class="form-control" name="fullname" required />

                  <label for="formFile" class="form-label">subir imagen de la promocion</label>
                  <input class="form-control" type="file" id="formFile">


                  <label>Dias disponibles:</label>
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="checkbox">
                        <label>
                          <!--   <input type="checkbox" class="flat" checked="checked" id="SI_SE"> lunes-->
                          <input type="checkbox" class="flat" id="SI_SE"> lunes
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" id="SI_SE"> martes
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" id="SI_SE"> miercoles
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" id="SI_SE"> jueves
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="flat" id="SI_SE"> viernes
                        </label>
                      </div>

                    </div>
                  </div>


                  <div class="col-md-12">
                    Date and Time
                    <form>


                      <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input type="text" name="reservation-time" id="reservation-time" class="form-control" value="01/01/2021 - 01/25/2021">
                      </div>


                    </form>
                  </div>

                  <label for="message">Descripcion (20 chars min, 100 max) :</label>
                  <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>

                  <br />
                  <span class="btn btn-primary">Agregar Promocion</span>

                </form>
                <!-- end form for validations -->

              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!--contenido de la plantilla -->
  <?php
  include '../componentes/footer.html';
  include '../componentes/scripts.html';
  ?>
  <script src="../../inc/funciones/admin/agregar_promocion.js"></script>
</body>

</html>