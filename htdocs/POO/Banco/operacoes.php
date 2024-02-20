<?php

//selecionar a conta

/*
$conta = $_POST["conta"];//insere o valor do input conta na variável conta
$conn = new MySQli('localhost','root','','banco');//conexão com o banco
$sql = "SELECT * FROM contas WHERE conta = $conta";//string de pesquisa
$result = mysqli_query($conn, $sql);//executa o comando SQL
//organizar a informação do banco no vetor
$linha = mysqli_fetch_array($result);*/
//teste - escreve a agência e conta que retornou do banco de dados
include("conta.php");
include("conexao.php");
$conta = $_POST["conta"];//número da conta que veio do HTML
$valor = $_POST["valor"];//número da conta que veio do HTML
$conn = new Conexao();
$c = new Conta();
$linha = $c->selecionarConta($conta, $conn);
echo "Agência: $linha[agencia] <br> Conta: $linha[conta]<br> ";
//definir e realizar a operação
switch ($_POST["operacao"]){
    case 'Saldo':
        $saldo = $c->getSaldo($conta, $conn);
        echo "Saldo: $saldo";
        break;
    case 'Saque':
        $result = $c->sacar($conta, $conn, $valor); 
        echo $result; break;
    case 'Deposito':
        $result = $c->depositar($conta, $conn, $valor);
        echo $result; break;
    default:
        echo "Operação inválida";
}


?>