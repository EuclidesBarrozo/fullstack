<?php
//criar uma matriz que represente um conjunto de 4 times. Cada time terão pontos de acordo com o resultado do jogo. Verificar a pontuação final de cada um.

$times = array(
    array(3, 1, 1),
    array(1, 1, 3),
    array(1, 3, 0),
    array(0, 0, 1)
);

for($i = 0; $i < 4; $i++){
    $soma = $times[$i][0] + $times[$i][1] + $times[$i][2];
    echo "Pontuação do time". ($i+1) .": $soma<br>";
}

?>