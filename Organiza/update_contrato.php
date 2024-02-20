<?php

session_start();
function verificarLogin(){
    if (!isset($_SESSION["user"])){
        header('Location:./index.html');
    }
}
verificarLogin();
include_once("conexao.php");

$id = $_POST["ID"];
$numero_contrato = $_POST["numero_contrato"];
$contratante = $_POST["contratante"];
$contratada = $_POST["contratada"];
$servico = $_POST["servico"];
$disponibilidade = $_POST["disponibilidade"];
$valor = $_POST["valor"];
$data = $_POST["data"];

$sql = "UPDATE contratos SET
Numero_contrato = $numero_contrato,
Contratante = $contratante,
Contratada = $contratada,
Servico = '$servico',
Disponibilidade = '$disponibilidade',
Valor = $valor,
Data = '$data'

WHERE ID = $id";

if(mysqli_query($conn,$sql))
{
    $_SESSION["result"] = "3";
    header('Location:./select_contratos.php');
}
else
{
    $_SESSION["result"] = "4";
    header('Location:./select_contratos.php');
}

mysqli_close($conn);


?>