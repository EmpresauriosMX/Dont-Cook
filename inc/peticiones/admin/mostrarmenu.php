<?php


    $pdo = new PDO("mysql:host=database-1.crf8ien6xwwp.us-west-1.rds.amazonaws.com;dbname=dontcook",
                    "adminadmin","S6fqcU7kYc5FdzatMZMs");

    
    $post= $pdo->query("SELECT * FROM `menus` WHERE id_menu = '3'")->fetch();

    echo $post["descripcion"];
?>