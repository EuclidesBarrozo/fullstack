<?php
include_once("conexao.php");

$id = $_POST['id'];
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];

$sql = "SELECT quantidade FROM produtos WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($result);

$quantidadeAtualizada = $linha['quantidade'] - $quantidade;

$sql = "UPDATE produtos SET quantidade = '$quantidadeAtualizada' WHERE id = '$id'";
mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)){   
    header('Location:./gerenciarProdutos2.php');
}else{   
    header('Location:./gerenciarProdutos2.php');
}

/*$sql = "UPDATE produtos SET produto = '$produto', valor = '$valor',
      quantidade = '$quantidade', validade = '$validade' 
      WHERE id = '$id'";

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
}*/



?>