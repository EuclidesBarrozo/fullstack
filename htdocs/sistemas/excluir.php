<?php
include_once("conexao.php");

$id = $_POST['id'];

$sql = "DELETE FROM produtos WHERE id = '$id'";
      
mysqli_query($conn, $sql);

session_start();//inicia a sessão
if(mysqli_affected_rows($conn)){   
    $_SESSION["excluir"] = "1";//atribui um valor a sessão
    header('Location:./gerenciarProdutos.php');
}else{   
    $_SESSION["excluir"] = "2";//atribui um valor a sessão
    header('Location:./gerenciarProdutos.php');
}



?>