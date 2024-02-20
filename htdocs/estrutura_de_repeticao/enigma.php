<?php
$animais = ["cachorro", "gato", "lobo", "raposa", "tigre"];
$posicao = 0;
$posicao = $posicao + ?;//2ª chave resposta no word
for($i = 0; $i < 5; $i++){
    if($i == $posicao){
        $posicao = $posicao ? 1;//3ª chave - resposta no código
        echo "Animal sorteado: $animais[$posicao]";
    }
}




?>