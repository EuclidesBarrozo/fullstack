<?php

session_start();
function verificarLogin(){
    if (!isset($_SESSION["user"])){
        header('Location:./index.html');
    }
}
verificarLogin();

//DADOS PESSOAIS
$id = $_POST['ID'];
$nome = $_POST['nome'];
$cpf  = $_POST['cpf'];
$rg = $_POST['rg'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$profissao = $_POST['profissao'];
$data_nascimento = $_POST['data_nascimento'];
$observacao = $_POST['observacao'];

//ENDERECO
$id_endereco = $_POST['ID_Endereco'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];

//SOLICITACAO
$id_solicitacao = $_POST['ID_Solicitacao'];
//$bike = ( isset($_POST['bike']) ) ? true : null;
$disponibilidade = $_POST['disponibilidade'];
$baba = ( isset($_POST['B']) ) ? true : false;
$domestica = ( isset($_POST['D']) ) ? true : false;
$f_baba = ( isset($_POST['FB']) ) ? true : false;
$faxineira = ( isset($_POST['F']) ) ? true : false;
$cozinheira = ( isset($_POST['Coz']) ) ? true : false;
$cuidadora = ( isset($_POST['Cui']) ) ? true : false;
$f_cuidadora = ( isset($_POST['FC']) ) ? true : false;

include_once("conexao.php");
//CADASTRO ENDERECO
$sql = "UPDATE clientes_endereco SET 
Rua = '$rua',
Numero = '$numero',
Bairro = '$bairro',
Cidade = '$cidade',
Estado = '$estado',
CEP    = '$cep'
WHERE ID = '$id_endereco'";

mysqli_query($conn,$sql);


//CADASTRO SOLICITACAO
$sql = "UPDATE clientes_solicitacao SET 
Baba = '$baba',
Cozinheira = '$cozinheira',
Cuidadora = '$cuidadora',
Disponibilidade = '$disponibilidade',
Domestica = '$domestica',
Faxineira = '$faxineira', 
F_Baba = '$f_baba', 
F_Cuidadora = '$f_cuidadora'
WHERE ID = '$id_solicitacao'";

mysqli_query($conn,$sql);


//CADASTRO DADOS PESSOAIS
$sql = "UPDATE clientes SET 
Nome = '$nome',
CPF = '$cpf',
RG = '$rg',
Data_nascimento = '$data_nascimento', 
Telefone1 = '$telefone1',
Telefone2 = '$telefone2',
Profissao = '$profissao',
Observacao = '$observacao'

WHERE ID = '$id'";

if(mysqli_query($conn,$sql))
{
    $_SESSION["result"] = "3";
    header('Location:./select_clientes.html.php');
}
else
{
    $_SESSION["result"] = "4";
    header('Location:./select_clientes.html.php');
}
mysqli_close($conn);

?>