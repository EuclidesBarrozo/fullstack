<?php
include_once("conexao.php");

$id = $_POST['id'];
$produto = $_POST['produto'];
echo $id;
echo $produto;
//$valor = $_POST['valor'];
//$quantidade = $_POST['quantidade'];
//$validade = $_POST['validade'];
/*
$sql = "UPDATE produtos SET produto = '$produto', valor = '$valor',
      quantidade = '$quantidade', validade = '$validade' 
      WHERE id = '$id'";
*/
$sql = "UPDATE produtos SET produto = '$produto' 
      WHERE id = '$id'";

mysqli_query($conn, $sql);

session_start();//inicia a sessão
if(mysqli_affected_rows($conn)){   
    $_SESSION["atualizar"] = "1";//atribui um valor a sessão
    header('Location:./gerenciarProdutos2.php');
}else{   
    $_SESSION["atualizar"] = "2";//atribui um valor a sessão
    header('Location:./gerenciarProdutos2.php');
}



?>