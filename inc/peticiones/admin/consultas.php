<?php

$contenido = $_REQUEST["contenido"];

$link = new PDO("mysql:host=database-1.crf8ien6xwwp.us-west-1.rds.amazonaws.com;dbname=dontcook",
                "adminadmin","S6fqcU7kYc5FdzatMZMs");

$statement = $link->prepare("INSERT INTO menus(descripcion)
                            VALUES(:contenido)");

$statement->execute(["contenido" => $contenido]);

echo("Se envio esa madreeeee");

?>