<?php

include_once("conexao.php");
include_once("head.php");
$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "
    <table class='table table-striped table-sm' id='tabelaPrincipal'>
    <tr>
    
    <th>ID</th>
    <th>Produto</th>
    
    <th>Valor</th>
    <th>Quantidade</th>
    <th>Validade</th>
    
    <th>Editar</th>
    <th>Deletar</th>
   
    </tr>";

    while($linha = mysqli_fetch_array($result)){
        echo "<tr id='trCadastro'>
        <form action='pesquisa.php' method='POST'>
        <td data-label='ID'>".$linha["id"]."</td>
        <td data-label='Produto'>".$linha["produto"]."</td>
        <td data-label='Valor'>".$linha["valor"]."</td>
        <td data-label='Quantidade'>".$linha["quantidade"]."</td>
        <td data-label='Validade'>".$linha["validade"]."</td>
        
        <td><input class='btn
        btn-warning' type='submit' name='comando'
        value='Editar' ></td>
        <td><input class='btn
        btn-warning' type='submit' name='comando'
        value='Deletar' ></td>

        <input type='hidden' name='id' value= '".$linha
        ["id"]."'>
        </form>
        <!--Ele está constantemente atualizando-->
        </tr>";
    
        
    }
    echo "</table>";}
    else {
    echo "0 resultado";
    }
    
?>