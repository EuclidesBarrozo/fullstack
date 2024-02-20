<?php
session_start();
function verificarLogin(){
    if (!isset($_SESSION["user"])){
        header('Location:./index.html');
    }
}
verificarLogin();

$numero_contrato = $_POST["numero_contrato"];
$contratante = $_POST["contratante"];
$contratada = $_POST["contratada"];
$servico = $_POST["servico"];
$disponibilidade = $_POST["disponibilidade"];
$valor = $_POST["valor"];
$data = $_POST["data"];

include_once("conexao.php");

$sql = "INSERT INTO contratos (Numero_contrato, Contratante, Contratada, Servico, Disponibilidade, Valor, Data)
VALUES ('$numero_contrato','$contratante','$contratada','$servico','$disponibilidade','$valor', '$data')";

if(mysqli_query($conn, $sql))
{
    $_SESSION["result"] = "1";

    $sql = "UPDATE clientes SET Contratou = 'Sim' WHERE CPF = '$contratante'";
    mysqli_query($conn, $sql);
    
    header('Location:./select_contratos.php');
}
else
{
    $_SESSION["result"] = "2";
    header('Location:./select_contratos.php');
}

?>