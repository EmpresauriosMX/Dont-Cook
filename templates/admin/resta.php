<?php
/*
echo "<p></p>";
$dias = "1,2,3,,,6,7,8";
echo ($dias);
echo "<p></p>";
list($lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$todos) = explode(",",$dias);

if($lunes == "1"){
    echo $lunes; 
    $lunes = "Lunes"; 
    echo ".- "; 
    echo $lunes; // Imprime
    echo "<p></p>";
}else{$lunes = "";}
if($martes == "2"){
    echo $martes; 
    $martes = "Martes"; 
    echo ".- "; 
    echo $martes; // Imprime
    echo "<p></p>";
}else{$martes = "";}
if($miercoles == "3"){
    echo $miercoles; 
    $miercoles = "Miercoles"; 
    echo ".- "; 
    echo $miercoles; // Imprime
    echo "<p></p>";
}else{$miercoles = "";}
if($jueves == "4"){
    echo $jueves; 
    $jueves = "Jueves"; 
    echo ".- "; 
    echo $jueves; // Imprime
    echo "<p></p>";
}else{$jueves = "";}
if($viernes == "5"){
    echo $viernes; 
    $viernes = "Viernes"; 
    echo ".- "; 
    echo $viernes; // Imprime
    echo "<p></p>";
}else{$viernes = "";}
if($sabado == "6"){
    echo $sabado; 
    $sabado = "Sabado"; 
    echo ".- "; 
    echo $sabado; // Imprime
    echo "<p></p>";
}else{$sabado = "";}
if($domingo == "7"){
    echo $domingo; 
    $domingo = "Domingo"; 
    echo ".- "; 
    echo $domingo; // Imprime
    echo "<p></p>";
}else{$domingo = "";}
if($todos == "8"){
    echo $todos; 
    $todos = "todos los dias"; 
    echo ".- "; 
    echo $todos; // Imprime
    echo "<p></p>";
}else{$todos = "";} 
*/

?>

<script type="text/javascript">
    var cadenadias = ",2,3,,,6,7,";
    var coma = ",";
    var arrayDeCadenas = "";
    function dividirCadena(cadenaADividir,separador) {
        arrayDeCadenas = cadenaADividir.split(separador);
        document.write('<p>La cadena original es: "' + cadenaADividir + '" <br>');

        for (var i=0; i < arrayDeCadenas.length; i++) {
            document.write("arrayDeCadenas[" +i + "]" + "= "+ arrayDeCadenas[i] + "<br>");
        }
        
        if(arrayDeCadenas[0] == 1){arrayDeCadenas[0] = "Lunes";}
        if(arrayDeCadenas[1] == 2){arrayDeCadenas[1] = "Martes";}
        if(arrayDeCadenas[2] == 3){arrayDeCadenas[2] = "Miercoles";}
        if(arrayDeCadenas[3] == 4){arrayDeCadenas[3] = "Jueves";}
        if(arrayDeCadenas[4] == 5){arrayDeCadenas[4] = "Viernes";}
        if(arrayDeCadenas[5] == 6){arrayDeCadenas[5] = "Sabado";}
        if(arrayDeCadenas[6] == 7){arrayDeCadenas[6] = "Domingo";}
        if(arrayDeCadenas[7] == 8){arrayDeCadenas[7] = "Todos";}
        
    }   
    dividirCadena(cadenadias, coma);

    console.log (arrayDeCadenas);


</script>