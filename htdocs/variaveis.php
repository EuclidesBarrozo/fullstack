<?php
//Faça um script que peça o tamanho de um arquivo para download (em MB) e a velocidade de um link de Internet (em Mbps), 
//calcule e informe o tempo aproximado de download do arquivo usando este link (em segundos).
$tamanho = 100;
$velocidade = 10;

$tempo = $tamanho / $velocidade;

echo "Tempo estimado ". $tempo. " segundos";
//Digite o valor das 3 medidas (altura, largura, comprimento) de uma caixa d'água retangular, calcule seu volume em m³ e depois calcule sua capacidade em litros.

$altura      = 1.5;
$largura     = 3;
$comprimento = 5;

$metrosCubicos = $altura * $largura * $comprimento;
echo "<br> Capacidade da caixa d'água: $metrosCubicos m³.";

$litros = $metrosCubicos * 1000;
echo"<br> Capacidade em litros é ".$litros;

?>