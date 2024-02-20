<?php

$produto = $_POST["produto"];
$valor = $_POST["valor"];
$quantidade = $_POST["quantidade"];
$validade = $_POST["validade"];

//CONEXÃO COM BANCO DE DADOS
//$conn = new MySQli('localhost','usuario','senha','banco de dados');
$conn = new MySQli('localhost','root','','produtos_full');

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else{
  $sql = "INSERT INTO produtos (produto, valor, quantidade, validade)
VALUE ('$produto', '$valor', '$quantidade', '$validade')";

if(mysqli_query($conn,$sql)){ 
  session_start();//inicia a sessão
  if(mysqli_affected_rows($conn)){   
      $_SESSION["cadastrar"] = "1";//atribui um valor a sessão
      header('Location:./gerenciarProdutos.php');
  }else{   
      $_SESSION["cadastrar"] = "2";//atribui um valor a sessão
      header('Location:./gerenciarProdutos.php');
  }
}else{
    echo "Falha no comando SQL.";
  } 
}    





