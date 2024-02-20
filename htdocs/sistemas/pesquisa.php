<?php
/*
if (isset($_SESSION["result"])){
    if($_SESSION["result"] == "1") {
        //unset($_SESSION["result"]);
        echo "<script>alert('Atualização feita com sucesso');</script>";
    }
    else if ($_SESSION["result"] == "2"){
        //unset($_SESSION["result"]);
        echo "<script>alert('Erro ao atualizar contrato');</script>";
    }
}*/

$id = $_POST["id"];
include_once("head.php");
include_once("conexao.php");
$sql = "SELECT * FROM produtos where id = $id";
$resultado = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($resultado);

if($linha){
    echo " <body>
    <div class='card container mt-3'>
        <div class='mt-2'>
            <h2 style= 'text-align: center;' class='mt-0'>PESQUISA DE PRODUTOS</h2>
        </div>
        <form action='atualizar.php' method='POST'>
            <div class='mb-3'>
                <label class='form-label'>Produto*</label>
                <input type='text' class='form-control' id='produto' name='produto' value = '$linha[produto]' onblur='V_produto(this)' required>
                <div id='alertaProduto' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Valor*</label>
                <input type='text' class='form-control' id='valor' name='valor' value = '$linha[valor]' onblur='V_valor(this)' required>
                <div id='alertaValor' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Quantidade*</label>
                <input type='number' class='form-control' id='quantidade' name='quantidade' value = '$linha[quantidade]' onblur='V_quantidade(this)' required>
                <div id='alertaQuantidade' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Validade*</label>
                <input type='date' class='form-control' id='validade' name='validade' value = '$linha[validade]' onblur='V_validade(this)' required>
                <div id='alertaValidade' class='form-text'></div>
            </div>
            <input type='hidden' name='id' value= '$linha[id]'>
            <div class='mb-3'>
                <input type='submit' class='btn btn-primary' value='Atualizar' onclick='V_cadastrar()'>
            </div>
        </form>
    </div>
    </body>";
}else{
    echo "Produto não localizado.";
}
?>