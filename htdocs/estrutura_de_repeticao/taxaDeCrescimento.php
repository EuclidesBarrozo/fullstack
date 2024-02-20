<?php
/*Chico tem 1,50 metro e cresce 2 centímetros por ano, enquanto Zé tem 1,10 metro e cresce 3 centímetros por ano. Construa um algoritmo que calcule e imprima quantos anos serão necessários para que Zé seja maior que Chico.*/
$chico = 150;
$ze = 110;
$ano = 0;
while($ze <= $chico){
    $chico += 2;
    $ze += 3;
    $ano++;
}
echo "Ano: $ano - Zé: $ze e Chico: $chico";
?>

