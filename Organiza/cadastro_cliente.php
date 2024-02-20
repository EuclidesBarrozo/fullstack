<?php
session_start();
function verificarLogin(){
    if (!isset($_SESSION["user"])){
        header('Location:./index.html');
    }
}
verificarLogin();
//DADOS PESSOAIS
$nome = $_POST['nome'];
$cpf  = $_POST['cpf'];
$rg = $_POST['rg'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$profissao = $_POST['profissao'];
$data_nascimento = $_POST['data_nascimento'];
$observacao = $_POST['observacao'];

//ENDERECO
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];

//SOLICITACAO
$disponibilidade = $_POST['disponibilidade'];
$baba = ( isset($_POST['B']) ) ? true : 0;
$domestica = ( isset($_POST['D']) ) ? true : 0;
$f_baba = ( isset($_POST['FB']) ) ? true : 0;
$faxineira = ( isset($_POST['F']) ) ? true : 0;
$cozinheira = ( isset($_POST['Coz']) ) ? true : 0;
$cuidadora = ( isset($_POST['Cui']) ) ? true : 0;
$f_cuidadora = ( isset($_POST['FC']) ) ? true : 0;

$contratou = "Não";

include_once("conexao.php");

//CADASTRO ENDERECO
$sql = "INSERT INTO clientes_endereco (Rua, Numero, Bairro, Cidade, Estado, CEP)
VALUE ('$rua', '$numero', '$bairro', '$cidade','$estado', '$cep')";
mysqli_query($conn,$sql);
$id_endereco = mysqli_insert_id( $conn ); // Aqui obtemos o ID do registro inserido

//CADASTRO SOLICITACAO
$sql = "INSERT INTO clientes_solicitacao (Baba, Cozinheira, Cuidadora, Disponibilidade, Domestica, Faxineira, F_Baba, F_Cuidadora)
VALUE ('$baba', '$cozinheira', '$cuidadora', '$disponibilidade','$domestica', '$faxineira', '$f_baba', '$f_cuidadora')";
mysqli_query($conn,$sql);
$id_solicitacao = mysqli_insert_id( $conn ); // Aqui obtemos o ID do registro inserido


//CADASTRO DADOS PESSOAIS
$sql = "INSERT INTO clientes (Nome, CPF, RG, Contratou, Data_Nascimento, Telefone1, Telefone2, Profissao, ID_Endereco, ID_Solicitacao, Observacao)
VALUE ('$nome', '$cpf', '$rg', '$contratou', '$data_nascimento','$telefone1', '$telefone2', '$profissao', '$id_endereco', '$id_solicitacao', '$observacao')";
if(mysqli_query($conn,$sql))
{
    $_SESSION["result"] = "1";
    header('Location:./select_clientes.html.php');
}
else
{
    $_SESSION['result'] = "2";
    header('Location:./select_clientes.html.php');
}

mysqli_close($conn);

?>