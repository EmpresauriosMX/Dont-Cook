<?php
session_start();
echo session_id();
echo $_SESSION['nombre'];
echo $_SESSION['id'];
?>