<?php
//Faça a média de duas notas e diga se o aluno foi aprovado ou reprovado. Use operador ternário.
$n1 = 8;
$n2 = 9;
$media = ($n1 + $n2)/2;

$status = $media >= 7 ? "aprovado":"reprovado";

echo "média: $media , o aluno está $status";


//Criar uma calculadora com os 4 operadores básicos
//1. soma 2.sub 3.mul 4.divisão
$n1 = 5;
$n2 = 6;
$op = 4;

switch($op){
    case 1: 
        $resultado = $n1+$n2;
        break;
    case 2: 
        $resultado = $n1-$n2;
        break;
    case 3: 
        $resultado = $n1*$n2;
        break;
    case 4: 
        $resultado = $n1/$n2;
        break;
    default:
        echo "Opção inválida.";
        $resultado = 0;
        break;
}
echo "Resultado: $resultado";








?>