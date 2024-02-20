<?php

$data = $_POST["data"];
$tipo = $_POST["tipo"];
$id_paciente = $_POST["id_paciente"];

echo " $data <br>";
echo " $tipo <br>";
echo " $id_paciente <br>";


include_once("conexao_santa_casa.php");


$sql = "INSERT INTO atendimentos (`data`, tipo, id_paciente) VALUES ('$data', '$tipo', '$id_paciente')";

if(mysqli_query($conn,$sql)){ 
  session_start();//inicia a sessão
  if(mysqli_affected_rows($conn)){   
      $_SESSION["cadastrar"] = "1";
      header('Location:./cadastrar_atendimento.html.php');
  }else{   
      $_SESSION["cadastrar"] = "2";
      header('Location:./cadastrar_atendimento.html.php');
  }
}else{
    echo "Falha no comando SQL.";
  } 
   





