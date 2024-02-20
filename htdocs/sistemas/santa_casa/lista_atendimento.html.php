<?php
include_once("conexao_santa_casa.php");
include_once("head.php");

$sql = "SELECT atendimentos.id_atendimento, pacientes.nome, atendimentos.data, atendimentos.tipo  FROM atendimentos JOIN pacientes ON atendimentos.id_paciente = pacientes.id_paciente";

$result = mysqli_query($conn, $sql);


if($result) {
    echo "<div class='container card mt-2'>
    <h2>Lista de Atendimentos</h2>

    <table class='table table-striped table-sm'>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Data</th>
    <th>Tipo</th>
    <th>Editar</th>
    <th>Deletar</th>
    </tr>";
    while($linha = mysqli_fetch_array($result)){
        echo "<tr>
        <form action='' method='POST'>
        <td data-label='ID'> $linha[id_atendimento]</td>
        <td data-label='Nome'> $linha[nome]</td>
        <td data-label='Data'>$linha[data]</td>
        <td data-label='Tipo'>$linha[tipo]</td>
        <td><input class='btn btn-warning' type='submit' value='Editar' ></td>
        <input type='hidden' name='id' value= '$linha[id_atendimento]'>
        </form>
        <form action = '' method='POST'>
        <td><input class='btn btn-danger' type='submit' value='Deletar' onclick=\"return confirm('Deseja deletar o produto')\" ></td>
        <input type='hidden' name='id' value= '$linha[id_atendimento]'>
        </form>
        </tr>";
    }
    echo "</table> <div>"; 
}
else {
    echo "0 resultado";
}
?>
