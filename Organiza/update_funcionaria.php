<?php

session_start();
function verificarLogin(){
    if (!isset($_SESSION["user"])){
        header('Location:./index.html');
    }
}
verificarLogin();

session_start();

//DADOS PESSOAIS
$id = $_POST["ID"]; //ok
$nome = $_POST['nome']; //ok
$cpf  = $_POST['cpf']; //ok
$rg = $_POST['rg']; //ok
$telefone1 = $_POST['telefone1']; //ok
$telefone2 = $_POST['telefone2']; //ok
$data_nascimento = $_POST['data_nascimento']; //ok
$naturalidade = $_POST["naturalidade"]; //ok
$nacionalidade = $_POST["nacionalidade"]; //ok
$estado_civil = $_POST["estado_civil"]; //ok
$sexo = $_POST["sexo"]; //ok
$numero_de_filhos = $_POST["numero_de_filhos"]; //ok
$responsavel_filhos_ausencia = $_POST["responsavel_filhos_ausencia"]; //ok

$referencias = $_POST["referencias"]; //ok
$observacao = $_POST['observacao']; //ok

//ENDERECO
$id_endereco = $_POST["ID_Endereco"]; //ok
$rua = $_POST['rua']; //ok
$numero = $_POST['numero']; //ok
$bairro = $_POST['bairro']; //ok
$cidade = $_POST['cidade']; //ok
$estado = $_POST['estado']; //ok
$cep = $_POST['cep']; //ok

//DADOS PROFISSIONAIS
$escolaridade = $_POST["escolaridade"]; //ok
$indicacao = $_POST["indicacao"]; //ok
$disponibilidade = $_POST['disponibilidade']; //ok

//PRETENSÃO PROFISSIONAL
$id_solicitacao = $_POST["ID_Solicitacao"]; //ok
$baba = ( isset($_POST['B']) ) ? true : 0; //ok
$domestica = ( isset($_POST['D']) ) ? true : 0; //ok
$f_baba = ( isset($_POST['FB']) ) ? true : 0; //ok
$faxineira = ( isset($_POST['F']) ) ? true : 0; //ok
$cozinheira = ( isset($_POST['Coz']) ) ? true : 0; //ok
$cuidadora = ( isset($_POST['Cui']) ) ? true : 0; //ok
$f_cuidadora = ( isset($_POST['FC']) ) ? true : 0; //ok

// echo "$nome $cpf $rg $telefone1 $telefone2 $data_nascimneto $naturalidade $nacionalidade $estado_civil $sexo $numero_de_filhos $responsavel_filhos_ausencia $rua $numero $bairro $cidade $estado $cep $escolaridade $disponibilidade $baba $domestica $f_baba $faxineira $cozinheira $cuidadora $f_cuidadora $indicacao $referencias $observacao";

include_once("conexao.php");

//CADASTRO ENDERECO
$sql = "UPDATE funcionarios_endereco SET 
Rua = '$rua',
numero = '$numero',
Bairro = '$bairro',
Cidade = '$cidade',
Estado = '$estado',
Cep    = '$cep'
WHERE ID = '$id_endereco'";
mysqli_query($conn,$sql);
// echo mysqli_error($conn);

//CADASTRO SOLICITACAO
$sql = "UPDATE funcionarios_solicitacao SET 
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
// echo mysqli_error($conn);

//CADASTRO DADOS PESSOAIS
$sql = "UPDATE funcionarios SET
Nome = '$nome',
RG = '$rg',
CPF = '$cpf',
Data_nascimento = '$data_nascimento',
Telefone1 = '$telefone1',
Telefone2 = '$telefone2',
Nacionalidade = '$nacionalidade',
Naturalidade = '$naturalidade',
Estado_civil = '$estado_civil',
Sexo = '$sexo',
Escolaridade = '$escolaridade',
Numero_de_filhos = '$numero_de_filhos',
Responsavel_filhos_ausencia = '$responsavel_filhos_ausencia',
Indicacao = '$indicacao',
Referencias = '$referencias',
Observacoes = '$observacao'

WHERE ID= '$id'";

// mysqli_query($conn,$sql);
// echo mysqli_error($conn);

if(mysqli_query($conn,$sql))
{
    $_SESSION["result"] = "3";
    header('Location:./select_funcionarias.php');
}
else
{
    $_SESSION["result"] = "4";
    header('Location:./select_funcionarias.php');
}

mysqli_close($conn);

?>