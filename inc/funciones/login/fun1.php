<?php

    require '../../../conexion.php';

    //COMPROBACIÓN DE CORREO EXISTENTE
    $sql = "SELECT * FROM `usuarios`;";
    $consulta = mysqli_query($conn, $sql);
    $correo = $_POST['email'];
    $correo_existe = false;
    while ($row = mysqli_fetch_assoc($consulta)) { //usar cuando se espera varios resultadosS
        if($correo ==  $row['correo']){{
            $correo_existe = true;
        }}
    }

    if($correo_existe == TRUE){
        ?>
        <form action="enviar.php" method="post">
            <input  type="hidden" id="<?php $correo ?>" name="<?php $correo ?>" value="<?php $correo ?>">
        </form>
        <?php
    }
    
?>