<?php
session_start();

/* Criei esse PHP com o propóstio de auxiliar o jQuery em funções específicas do filtro e outras funções futuras caso necessárias */


include_once("./conexao.php");

//$sql = "SELECT funcionarios.ID, funcionarios.Nome, funcionarios.Telefone1, funcionarios_solicitacao.Disponibilidade, funcionarios_solicitacao.Baba, funcionarios_solicitacao.Cozinheira, funcionarios_solicitacao.Cuidadora, funcionarios_solicitacao.Domestica, funcionarios_solicitacao.Faxineira, funcionarios_solicitacao.F_Baba, funcionarios_solicitacao.F_Cuidadora FROM funcionarios, funcionarios_solicitacao WHERE funcionarios.ID_Solicitacao = funcionarios_solicitacao.ID"

//

function gerarTabelaHTML($mysqli_query, $tabela){
    if($tabela != "contratos"){

        if ($tabela == "clientes") 
        { 
            $tabela = "cliente";
            echo "<tr>   
            <th>Nome</th>
            <th>Telefone</th>
            <th>Contratou</th>
            <th>Disponibilidade</th>
            <th>Babá</th>
            <th>Cozinheira</th>
            <th>Cuidadora</th>
            <th>Doméstica</th>
            <th>Faxineira</th>
            <th>F.Babá</th>
            <th>F.Cuidadora</th>
            
            <th>Editar</th>
        </tr>";

        while ($linha = mysqli_fetch_array($mysqli_query)){

            $id = $linha["ID"];
            $nome = $linha["Nome"];
            $telefone = $linha["Telefone1"];
            $contratou = $linha["Contratou"];
            $disponibilidade = $linha["Disponibilidade"];
            $baba = $linha["Baba"];
            $coz = $linha["Cozinheira"];
            $cui = $linha["Cuidadora"];
            $dom = $linha["Domestica"];
            $fax = $linha["Faxineira"];
            $f_baba = $linha["F_Baba"];
            $f_cuidadora = $linha["F_Cuidadora"];

            echo "<tr id='trCadastro'>
            <td data-label='Nome'>$nome</td>
            <td data-label='Telefone'>$telefone</td>
            <td data-label='Contratou'>$contratou</td>
            <td data-label='Disponibilidade'>$disponibilidade</td>
            <td data-label='Baba'>$baba</td>
            <td data-label='Cozinheira'>$coz</td>
            <td data-label='Cuidadora'>$cui</td>
            <td data-label='Domestica'>$dom</td>
            <td data-label='Faxineira'>$fax</td>
            <td data-label='F_Baba'>$f_baba</td>
            <td data-label='F_Cuidadora'>$f_cuidadora</td>
            
                <td><form action='update_$tabela.html.php' method='POST'>
                <input class='btn
                btn-warning' type='submit' name='comando'
                value='Editar'>
                <input type='hidden' name='ID' value='$id'></form>
                </td>
            
            <!--Ele está constantemente atualizando-->
            </tr>";
        }

        }
        if ($tabela == "funcionarios")
        {
            $tabela = "funcionaria";

            echo "<tr>   
            <th>Nome</th>
            <th>Telefone</th>
            <th>Disponibilidade</th>
            <th>Babá</th>
            <th>Cozinheira</th>
            <th>Cuidadora</th>
            <th>Doméstica</th>
            <th>Faxineira</th>
            <th>F.Babá</th>
            <th>F.Cuidadora</th>
            
            <th>Editar</th>
        </tr>";

        while ($linha = mysqli_fetch_array($mysqli_query)){

            $id = $linha["ID"];
            $nome = $linha["Nome"];
            $telefone = $linha["Telefone1"];
            $disponibilidade = $linha["Disponibilidade"];
            $baba = $linha["Baba"];
            $coz = $linha["Cozinheira"];
            $cui = $linha["Cuidadora"];
            $dom = $linha["Domestica"];
            $fax = $linha["Faxineira"];
            $f_baba = $linha["F_Baba"];
            $f_cuidadora = $linha["F_Cuidadora"];

            echo "<tr id='trCadastro'>
            <td data-label='Nome'>$nome</td>
            <td data-label='Telefone'>$telefone</td>
            <td data-label='Disponibilidade'>$disponibilidade</td>
            <td data-label='Baba'>$baba</td>
            <td data-label='Cozinheira'>$coz</td>
            <td data-label='Cuidadora'>$cui</td>
            <td data-label='Domestica'>$dom</td>
            <td data-label='Faxineira'>$fax</td>
            <td data-label='F_Baba'>$f_baba</td>
            <td data-label='F_Cuidadora'>$f_cuidadora</td>
            
                <td><form action='update_$tabela.html.php' method='POST'>
                <input class='btn
                btn-warning' type='submit' name='comando'
                value='Editar'>
                <input type='hidden' name='ID' value='$id'></form>
                </td>
            
            <!--Ele está constantemente atualizando-->
            </tr>";
        }
        }      
    }
    else{
        echo "
        <tr>
        
        <th>Numero_contrato</th>
        <th>Contratante</th>
        
        <th>Contratada</th>
        <th>Servico</th>
        <th>Disponibilidade</th>
        <th>Valor</th>
        <th>Data</th>
        
        <th>Editar</th>
    
        </tr>";

        while($linha = mysqli_fetch_array($mysqli_query)){
            echo "<tr id='trCadastro'>
            <td data-label='Numero do Contrato'>".$linha["Numero_contrato"]."</td>
            <td data-label='Contratante'>".$linha["Contratante"]."</td>
            <td data-label='Contratada'>".$linha["Contratada"]."</td>
            <td data-label='Serviço'>".$linha["Servico"]."</td>
            <td data-label='Disponibilidade'>".$linha["Disponibilidade"]."</td>
            <td data-label='Valor'>".$linha["Valor"]."</td>
            <td data-label='Data'>".$linha["Data"]."</td>
            <td>
            <form action='update_contrato.html.php' method='POST'>
            <input class='btn
            btn-warning' type='submit' name='comando'
            value='Editar' >
            <input type='hidden' name='ID' value= '".$linha
            ["ID"]."'>
            </form></td>
            <!--Ele está constantemente atualizando-->
            </tr>";
        }
    }

    
}
function retornarTabelaComFiltros($conexao, $tabela, $filtros)
{
    $filtros = json_decode($filtros, true);

    if($tabela != "contratos"){

        $tabela_solicitacao = "$tabela" . "_solicitacao";
        $tabela_endereco = "$tabela" . "_endereco";

        if ($tabela == "clientes"){
            $sql = "SELECT DISTINCT $tabela.ID, $tabela.Nome, $tabela.Telefone1, $tabela.Contratou, $tabela_solicitacao.Disponibilidade, $tabela_solicitacao.Baba, $tabela_solicitacao.Cozinheira, $tabela_solicitacao.Cuidadora, $tabela_solicitacao.Domestica, $tabela_solicitacao.Faxineira, $tabela_solicitacao.F_Baba, $tabela_solicitacao.F_Cuidadora FROM $tabela, $tabela_solicitacao, $tabela_endereco WHERE $tabela.ID_Solicitacao = $tabela_solicitacao.ID AND $tabela.ID_Endereco = $tabela_endereco.ID AND";
        }
        else{
            $sql = "SELECT DISTINCT $tabela.ID, $tabela.Nome, $tabela.Telefone1, $tabela_solicitacao.Disponibilidade, $tabela_solicitacao.Baba, $tabela_solicitacao.Cozinheira, $tabela_solicitacao.Cuidadora, $tabela_solicitacao.Domestica, $tabela_solicitacao.Faxineira, $tabela_solicitacao.F_Baba, $tabela_solicitacao.F_Cuidadora FROM $tabela, $tabela_solicitacao, $tabela_endereco WHERE $tabela.ID_Solicitacao = $tabela_solicitacao.ID AND $tabela.ID_Endereco = $tabela_endereco.ID AND";
        }

        if (isset($filtros["nome"])){
            $nome = $filtros["nome"];
            $sql .= " $tabela.Nome LIKE '%$nome%' AND";
        }

        if(isset($filtros["cpf"])){
            $cpf = $filtros["cpf"];
            $sql .= " $tabela.CPF LIKE '%$cpf%' AND";
        }

        if (isset($filtros["cidade"])){
            $cidade = $filtros["cidade"];
            $sql .= " $tabela_endereco.Cidade LIKE '%$cidade%' AND";
        }

        if (isset($filtros["servico"])){
            $servico = $filtros["servico"];

            if ($servico == "B"){ $servico = "Baba = 1";};
            if ($servico == "Coz"){ $servico = "Cozinheira = 1";};
            if ($servico == "Cui"){ $servico = "Cuidadora = 1";};
            if ($servico == "D"){ $servico = "Domestica = 1";};
            if ($servico == "F"){ $servico = "Faxineira = 1";};
            if ($servico == "FB"){ $servico = "F_Baba = 1";};
            if ($servico == "FC"){ $servico = "F_Cuidadora = 1";};

            $sql .= " $tabela_solicitacao.$servico AND";
        }

        if (isset($filtros["disponibilidade"])){
            $disponibilidade = $filtros["disponibilidade"];
            $sql .= " $tabela_solicitacao.disponibilidade = '$disponibilidade' AND";
        }
    
        $final = trim(substr($sql, strlen($sql) - 3, strlen($sql)));
        if ($final == "AND") { $sql = trim(substr($sql, 0, strlen($sql) - 3)); };

        $sql .= " LIMIT 0, 10";
        
        gerarTabelaHTML(mysqli_query($conexao, $sql), $tabela);
    }
    else{
        $sql = "SELECT * FROM contratos WHERE";

        if (isset($filtros["numero_contrato"])){
            $num_con = $filtros["numero_contrato"];
            $sql .= " Numero_contrato = $num_con AND";
        }

        if (isset($filtros["contratante"])){
            $contratante = $filtros["contratante"];
            $sql .= " Contratante LIKE '%$contratante%' AND";
        }

        if (isset($filtros["contratado"])){
            $contratado = $filtros["contratado"];
            $sql .= " Contratada LIKE '%$contratado%' AND";
        }
        
        if (isset($filtros["servico"])){
            $servico = $filtros["servico"];
            $sql .= " Servico = '$servico' AND";
        }

        if (isset($filtros["dia"])){
            $dia = $filtros["dia"];
            $sql .= " DAY(Data) = $dia AND";
        }

        if (isset($filtros["mes"])){
            $mes = $filtros["mes"];
            $sql .= " MONTH(Data) = $mes AND";
        }

        if (isset($filtros["ano"])){
            $ano = $filtros["ano"];
            $sql .= " YEAR(Data) = $ano AND";
        }

        $final = trim(substr($sql, strlen($sql) - 3, strlen($sql)));
        if ($final == "AND") { $sql = trim(substr($sql, 0, strlen($sql) - 3)); };

        $sql .= " LIMIT 0, 10";
        
        gerarTabelaHTML(mysqli_query($conexao, $sql), $tabela);
    }
    $_SESSION["filtro"] = $sql;
}

function retornarQtdRegistros($conexao, $doFiltro){
    if ($doFiltro == "sim"){
        $sql = mysqli_query($conexao, trim(explode('LIMIT', $_SESSION["filtro"])[0]));
        $qtdRegistros = mysqli_num_rows($sql);
    }
    else{
        if ($doFiltro != "contratos"){
            $tabela = $doFiltro;
            $tabela_solicitacao = "$tabela" . "_solicitacao";
            $tabela_endereco = "$tabela" . "_endereco";

            $sql = "SELECT $tabela.ID, $tabela.Nome, $tabela.Telefone1, $tabela_solicitacao.Disponibilidade, $tabela_solicitacao.Baba, $tabela_solicitacao.Cozinheira, $tabela_solicitacao.Cuidadora, $tabela_solicitacao.Domestica, $tabela_solicitacao.Faxineira, $tabela_solicitacao.F_Baba, $tabela_solicitacao.F_Cuidadora FROM $tabela, $tabela_solicitacao, $tabela_endereco WHERE $tabela.ID_Solicitacao = $tabela_solicitacao.ID AND $tabela.ID_Endereco = $tabela_endereco.ID";
            
            $sql = mysqli_query($conexao, $sql);
            $qtdRegistros = mysqli_num_rows($sql);
        }
        else{
            $sql = "SELECT * FROM contratos";
            $sql = mysqli_query($conexao, $sql);
            $qtdRegistros = mysqli_num_rows($sql);
        }
    }

    echo $qtdRegistros;
    
}

function atualizarTabela($conexao, $tabela, $pagina){
    
    $pagina = (int)$pagina;

    if (isset($_SESSION["filtro"])){
        
        $sql = trim(explode('LIMIT', $_SESSION["filtro"])[0]);

        $de = 0 + 10 * ($pagina - 1);
        $ate = 10;
        $sql .= " LIMIT $de, $ate";

        gerarTabelaHTML(mysqli_query($conexao, $sql), $tabela);
    }
    else{

        if ($tabela != "contratos"){
            $tabela_solicitacao = "$tabela" . "_solicitacao";
            $tabela_endereco = "$tabela" . "_endereco";

            if ($tabela == "clientes"){
                $sql = "SELECT DISTINCT $tabela.ID, $tabela.Nome, $tabela.Telefone1, $tabela.Contratou, $tabela_solicitacao.Disponibilidade, $tabela_solicitacao.Baba, $tabela_solicitacao.Cozinheira, $tabela_solicitacao.Cuidadora, $tabela_solicitacao.Domestica, $tabela_solicitacao.Faxineira, $tabela_solicitacao.F_Baba, $tabela_solicitacao.F_Cuidadora FROM $tabela, $tabela_solicitacao, $tabela_endereco WHERE $tabela.ID_Solicitacao = $tabela_solicitacao.ID AND $tabela.ID_Endereco = $tabela_endereco.ID";
            }
            else{
                $sql = "SELECT DISTINCT $tabela.ID, $tabela.Nome, $tabela.Telefone1, $tabela_solicitacao.Disponibilidade, $tabela_solicitacao.Baba, $tabela_solicitacao.Cozinheira, $tabela_solicitacao.Cuidadora, $tabela_solicitacao.Domestica, $tabela_solicitacao.Faxineira, $tabela_solicitacao.F_Baba, $tabela_solicitacao.F_Cuidadora FROM $tabela, $tabela_solicitacao, $tabela_endereco WHERE $tabela.ID_Solicitacao = $tabela_solicitacao.ID AND $tabela.ID_Endereco = $tabela_endereco.ID";
            }

            $de = 0 + 10 * ($pagina - 1);
            $ate = 10;
            $sql .= " LIMIT $de, $ate";

            gerarTabelaHTML(mysqli_query($conexao, $sql), $tabela);
        }
        else{
            $sql = "SELECT * FROM contratos";

            $de = 0 + 10 * ($pagina - 1);
            $ate = 10;
            $sql .= " LIMIT $de, $ate";

            gerarTabelaHTML(mysqli_query($conexao, $sql), $tabela);
        }

    }
}

if (isset($_POST["filtroTabela"]) && 
    isset($_POST["tabela"]) &&
    isset($_POST["filtroData"])){
    retornarTabelaComFiltros($conn, $_POST["tabela"], $_POST["filtroData"]);
}

if (isset($_POST["tabelaNormal"]) &&
    isset($_POST["tabela"])){
    $tabela = $_POST["tabela"];
    if ($_POST["tabela"] != "contratos"){
        $tabela_endereco = $tabela . "_endereco";
        $tabela_solicitacao = $tabela . "_solicitacao";

        $sql = "SELECT $tabela.ID, $tabela.Nome, $tabela.Telefone1, $tabela_solicitacao.Disponibilidade, $tabela_solicitacao.Baba, $tabela_solicitacao.Cozinheira, $tabela_solicitacao.Cuidadora, $tabela_solicitacao.Domestica, $tabela_solicitacao.Faxineira, $tabela_solicitacao.F_Baba, $tabela_solicitacao.F_Cuidadora FROM $tabela, $tabela_solicitacao, $tabela_endereco WHERE $tabela.ID_Solicitacao = $tabela_solicitacao.ID AND $tabela.ID_Endereco = $tabela_endereco.ID LIMIT 0, 10";
    }
    else{
        $sql = "SELECT * FROM contratos LIMIT 0, 10";
    }

    $result = mysqli_query($conn, $sql);
    gerarTabelaHTML($result, $tabela);
}

if (isset($_POST["retornarQtdRegistros"])){
    if (isset($_POST["doFiltro"])){
        retornarQtdRegistros($conn, $_POST["doFiltro"]);
    }
}

if (isset($_POST["removerFiltro"])){
    unset($_SESSION["filtro"]);
}

if (isset($_POST["atualizarPag"]) &&
    isset($_POST["tabela"])){
    atualizarTabela($conn, $_POST["tabela"], $_POST["atualizarPag"]);
}
?>