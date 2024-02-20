<?php
$media = [0, 5 , 9 , 10, 8];
$aprovado = $recuperacao = $reprovado = 0;
for($cont = 0; $cont < 5; $cont++){
    //$media = rand(0 , 10);
    if($media[$cont] >= 7){
        $aprovado++;
        echo "Aprovado. Media: $media[$cont] <br>";
    }else if ($media[$cont] >= 4){
        $recuperacao++;
        echo "Recuperação. Media: $media[$cont] <br>";
    }else{
        $reprovado++;
        echo "Reprovado. Media: $media[$cont] <br>";
    }
}
echo "Aprovados: $aprovado <br>
      Recuperação: $recuperacao <br>
      Reprovados: $reprovado";

?>