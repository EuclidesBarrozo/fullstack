<?php
/* verificar a data de validade de 10 produtos
Utilizar estrutura de repetição (FOR)
estrutura condicional (ano, mês e dia)
Informar se os produtos estão vencidos ou validos*/

$diaAtual = date('d');
$mesAtual = date('m');
$anoAtual = date('Y');

for($cont = 1; $cont <= 10; $cont++){
    $ano = rand(2020, 2030);
    $mes = rand(1, 12);
    
    if($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes == 12 ){
        $dia = rand(1, 31);
    }else if ($mes == 2){
        $dia = rand(1, 28);
    }else{
        $dia = rand(1, 30);
    }

    if($ano > $anoAtual){
        echo "Produto válido. Vencimento: $dia/$mes/$ano <br>";
    }else if ($ano == $anoAtual){
        if($mes > $mesAtual){
        echo "Produto válido. Vencimento: $dia/$mes/$ano <br>"; 
        }else if ($mes == $mesAtual){
            if($dia >= $diaAtual){
            echo "Produto válido. Vencimento: $dia/$mes/$ano <br>";  
            }else{
            echo "Produto vencido. Vencimento: $dia/$mes/$ano <br>"; 
            }
        }else{
            echo "Produto vencido. Vencimento: $dia/$mes/$ano <br>";
        }
    }else {
        echo "Produto vencido. Vencimento: $dia/$mes/$ano <br>";
    }
}
?>