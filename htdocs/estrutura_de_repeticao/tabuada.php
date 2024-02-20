<?php
$numero = $_POST["num"];
$contador = 1;

while($contador <= 10){
    $resultado = $numero * $contador;
    echo "$numero X $contador = $resultado <br>";
    $contador++; 
}

?>

