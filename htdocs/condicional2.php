<?php
//Faça um sistema que gerêncie o estoque de uma empresa. Sabendo a quantidade estocada de um produto verifique o tipo de movimentação (entrada ou saída) e realize o cálculo para atualizar o estoque.
//Quantidade estocada:  
//tipo da movimentação: 
//quatidade movimentada: 
//Estoque atualizado: ?
$qtdEstocada = 100; 
$tipoMovimentacao = "entrada";
$qtdMovimentado = 30;

$estoqueAtual = 0;

/*if($tipoMovimentacao == "saída"){
    $estoqueAtual = $qtdEstocada - $qtdMovimentado;
}else{
    $estoqueAtual = $qtdEstocada + $qtdMovimentado;
}
*/
    $estoqueAtual = $tipoMovimentacao == "saída" ?  $qtdEstocada - $qtdMovimentado : $qtdEstocada + $qtdMovimentado;
    //teste lógico ? valor se verdadeiro : valor se falso

echo "Estoque: $qtdEstocada <br>
        Movimento: $tipoMovimentacao <br>
        Quantidade movimentada: $qtdMovimentado <br>
        Estoque Atual:". $estoqueAtual = $tipoMovimentacao == "saída" ?  $qtdEstocada - $qtdMovimentado : $qtdEstocada + $qtdMovimentado;




?>