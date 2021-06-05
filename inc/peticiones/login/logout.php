<?php
    session_start();
    session_destroy();
    header("location: ../../../templates/home/home.php");
    exit();
?>