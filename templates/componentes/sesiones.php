<?php
session_start();
//echo $_SESSION['nombre']; //
//echo $_SESSION['id'];//
?>
<input type="hidden" value="<?php echo $_SESSION['id']?>" id="id_usuario"> 