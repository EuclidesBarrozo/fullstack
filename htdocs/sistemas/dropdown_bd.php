<?php
include_once("conexao.php");
include_once("head.php");

$sql = "SELECT id, produto FROM produtos ORDER BY produto";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "<div class='container card mt-2'>
    <h2>Lista de produtos</h2>
    <form action='dropdown_pesquisa.php' method='POST'>
    <select class='form-select' name='id_produto'>";
    while($linha = mysqli_fetch_array($result)){
        echo "<option value='$linha[id]'> $linha[produto]</option>";
    }
    echo"</select>
        <input class='btn btn-danger mt-2 mb-2' type='submit' value='Pesquisar'>
    </form></div>";
}


