<?php
include_once('conexao.php');
include_once('head.php');

$sql = "SELECT COUNT(*) AS cont FROM produtos";
$result = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($result);

if($linha) {
  echo "<div class='container mt-2'>
  <div class='card' style='width: 18rem;'>
    <div class='card-body'>
      <h5 class='card-title text-center'>Quantidade de Registros</h5>
      <h1 class='card-subtitle mb-2 text-muted text-center'> $linha[cont]</h1>
    </div>
  </div>
</div>";


$sql = "SELECT SUM(quantidade) AS soma FROM produtos";
$result = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($result);

echo "<div class='container mt-2'>
  <div class='card' style='width: 18rem;'>
    <div class='card-body'>
      <h5 class='card-title text-center'>Quantidade de Produtos</h5>
      <h1 class='card-subtitle mb-2 text-muted text-center'> $linha[soma]</h1>
    </div>
  </div>
</div>";

    $sql = "SELECT produto, TIMESTAMPDIFF(DAY, NOW(), validade) AS prazo FROM produtos ORDER BY TIMESTAMPDIFF(DAY, NOW(), validade) LIMIT 0, 1";

$result = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($result);

echo "<div class='container mt-2'>
  <div class='card' style='width: 18rem;'>
    <div class='card-body'>
      <h5 class='card-title text-center'>Produto próximo do vencimento</h5>
      <h2 class='card-subtitle mb-2 text-muted text-center'>$linha[produto]</h2> 
      <h2 class='card-subtitle mb-2 text-muted text-center'> $linha[prazo] dias</h2>
      <input type='range' class='w-100' min='0' max='300' value='$linha[prazo]' list='markers'  disabled>
      <datalist id='markers'>
        <option value='0' label='0'></option>
        <option value='75' label='75'></option>
        <option value='150' label='150'></option>
        <option value='225' label='225'></option>
        <option value='300' label='300'></option>
      </datalist>
    </div>
  </div>
</div>";
}
else {
    echo '0 resultado';
}  

