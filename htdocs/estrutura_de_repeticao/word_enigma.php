<?php
    $numeros = [0, 5 , 9 , 10, 8];
    $calculo = 0;
    for($i = 0; $i < 5; $i++){
        $calculo += $numeros[$i];
        $calculo *= 3;
    }
    $calculo = ($calculo/72) - 10;
    echo $calculo > 1 ? "+":"-";

?>