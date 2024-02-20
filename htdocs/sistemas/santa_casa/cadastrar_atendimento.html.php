<?php

if (isset($_SESSION["cadastroAtendimento"])){
    if($_SESSION["cadastroAtendimento"] == "1") {
        unset($_SESSION["cadastroAtendimento"]);
        echo "<script>alert('Atendimento cadastrado com sucesso!');</script>";
    }
    else if ($_SESSION["cadastroAtendimento"] == "2"){
        unset($_SESSION["cadastroAtendimento"]);
        echo "<script>alert('Erro ao cadastrar atendimento.');</script>";
    }
}

include_once("head.php");
include_once("conexao_santa_casa.php");

$sql = "SELECT id_paciente, nome FROM pacientes";
$resultado = mysqli_query($conn, $sql);

echo " <body>
    <div class='card container mt-3'>
        <div class='mt-2'>
            <h2 style= 'text-align: center;' class='mt-0'>CADASTRO DE ATENDIMENTO</h2>
        </div>
        <form action='cadastrar_atendimento.php' method='POST'>
            <div class='mb-3'>
                <label class='form-label'>Data do atendimento*</label>
                <input type='date' class='form-control' id='data' name='data' onblur='V_data(this)' required>
                <div id='alertaData' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Triagem de atendimento*</label>
                <select class='form-select' name='tipo' id='triagem'>
                <option value='M' selected> Moderado</option>
                <option value='C'> Crítico</option>
                <option value='U'> Urgente</option>
                </select>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Nome do Paciente*</label>
                <select class='form-select' name='id_paciente' id='nome'>";
                if($resultado){
                    while($linha = mysqli_fetch_array($resultado)){
                echo"
                <option value='$linha[id_paciente]'> $linha[nome]</option>";
                }}
                echo "
                </select>
            </div>
            <div class='mb-3'>
                <input type='submit' class='btn btn-primary' value='Cadastrar' onclick='V_cadastrar()'>
            </div>
        </form>
    </div>
    </body>";
?>