<?php
include("conta.php");
include("conexao.php");//arquivo com a classe conexao
$c = new Conta();
//conexão
$conn = new Conexao();//criar objeto da classe conexao
$result = $c->criarConta($_POST["agencia"], $_POST["conta"], 0, $_POST["senha"], $conn);
//$conn->inserir($c);
echo $result;

?>