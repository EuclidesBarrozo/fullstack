<?php
//MATRIZ 3X2
$produtos1 = array(
            //  0,   1
    /*0*/array(4.50, 50),
    /*1*/array(6.50, 30),
    /*2*/array(4.00, 35)
);
$faturamento = 0;
$soma = 0;
for ($i = 0; $i < 3; $i++){
    //Valor X Quantidade (por produto) 
    $faturamento += $produtos1[$i][0] * $produtos1[$i][1];
    /*echo "Valor: ". $produtos1[$i][0]." 
    , Quantidade: ".$produtos1[$i][1]."<br>";*/
    //Somar as quantidades (de todos os produtos)
    $soma += $produtos1[$i][1];
}
echo "Faturamento máximo: $faturamento <br>";
echo "Quantidade de produtos: $soma";
//nome da matriz[linha][coluna]
/*
echo "Valor: ". $produtos1[0][0]." , Quantidade: ".$produtos1[0][1]."<br>";
echo $produtos1[1][0];*/




//atividade media dos alunos
?>