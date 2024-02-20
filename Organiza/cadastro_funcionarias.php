<?php

session_start();
function verificarLogin(){
    if (!isset($_SESSION["user"])){
        header('Location:./index.html');
    }
}
verificarLogin();

//DADOS PESSOAIS
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
$numero_de_filhos = $_POST["numero_de_filhos"] == "" ? 0 : $_POST["numero_de_filhos"]; //ok
$responsavel_filhos_ausencia = $_POST["responsavel_filhos_ausencia"]; //ok

$referencias = $_POST["referencias"]; //ok
$observacao = $_POST['observacao']; //ok

//ENDERECO
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
$baba = ( isset($_POST['B']) ) ? true : 0; //ok
$domestica = ( isset($_POST['D']) ) ? true : 0; //ok
$f_baba = ( isset($_POST['FB']) ) ? true : 0; //ok
$faxineira = ( isset($_POST['F']) ) ? true : 0; //ok
$cozinheira = ( isset($_POST['Coz']) ) ? true : 0; //ok
$cuidadora = ( isset($_POST['Cui']) ) ? true : 0; //ok
$f_cuidadora = ( isset($_POST['FC']) ) ? true : 0; //ok

// echo "$nome $cpf $rg $telefone1 $telefone2 $data_nascimneto $naturalidade $nacionalidade $estado_civil $sexo $numero_de_filhos $responsavel_filhos_ausencia $rua $numero $bairro $cidade $estado $cep $escolaridade $disponibilidade $baba $domestica $f_baba $faxineira $cozinheira $cuidadora $f_cuidadora";

include_once("conexao.php");

//CADASTRO ENDERECO
$sql = "INSERT INTO funcionarios_endereco (Rua, numero, Bairro, Cidade, Estado, CEP)
VALUE ('$rua', '$numero', '$bairro', '$cidade','$estado', '$cep')";

mysqli_query($conn,$sql);
// echo mysqli_error($conn);
$id_endereco = mysqli_insert_id( $conn ); // Aqui obtemos o ID do registro inserido

//CADASTRO SOLICITACAO
$sql = "INSERT INTO funcionarios_solicitacao (Baba, Cozinheira, Cuidadora, Disponibilidade, Domestica, Faxineira, F_Baba, F_Cuidadora)
VALUE ('$baba', '$cozinheira', '$cuidadora', '$disponibilidade','$domestica', '$faxineira', '$f_baba', '$f_cuidadora')";

mysqli_query($conn,$sql);
// echo mysqli_error($conn);
$id_solicitacao = mysqli_insert_id( $conn ); // Aqui obtemos o ID do registro inserido

//CADASTRO DADOS PESSOAIS
$sql = "INSERT INTO funcionarios (Nome,RG,CPF,Data_nascimento,Telefone1,Telefone2,Nacionalidade,Naturalidade,Estado_civil,Sexo,Escolaridade,Numero_de_filhos,Responsavel_filhos_ausencia,Indicacao,Referencias,Observacoes, ID_Endereco, ID_Solicitacao) VALUE ('$nome','$rg','$cpf','$data_nascimento','$telefone1','$telefone2','$nacionalidade','$naturalidade','$estado_civil','$sexo','$escolaridade','$numero_de_filhos','$responsavel_filhos_ausencia','$indicacao','$referencias','$observacao','$id_endereco','$id_solicitacao')";

// mysqli_query($conn, $sql);
// echo mysqli_error($conn);

if(mysqli_query($conn,$sql))
{
    $_SESSION["result"] = "1";
    header('Location:./select_funcionarias.php');
}
else
{
    $_SESSION["result"] = "2";
    header('Location:./select_funcionarias.php');
}

?>