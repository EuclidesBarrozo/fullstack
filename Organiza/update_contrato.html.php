<?php

session_start();
function verificarLogin(){
    if (!isset($_SESSION["user"])){
        header('Location:./index.html');
    }
}
verificarLogin();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contratos</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="inicio.html">Organiza</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="./select_clientes.html.php">Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="./select_funcionarias.php">Funcionárias</a></li>
                        <li class="nav-item"><a class="nav-link" href="./select_contratos.php">Contratos</a></li>
                        <li class="nav-item"><a class="nav-link" href="./senha.php">Senha</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">CADASTRO DE CONTRATOS</h2>
                        <hr class="divider" />
                        
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!
                        
                        NOME, RG, CPF, TELEFONE 1 E 2, NATURALIDADE NACIONALIDADE, ESTADO CIVIL, SEXO, QUANTIDADE DE FILHOS, data de nascimento
                        -->
                        <form action="update_contrato.php" method="post">
<?php 

$id = $_POST["ID"];

include_once("conexao.php");

$sql = "SELECT * FROM contratos WHERE id = $id";
$result = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($result);

$numero_contrato = $linha["Numero_contrato"] != "" ? $linha["Numero_contrato"] : "";
$contratante = $linha["Contratante"] ? $linha["Contratante"] : "";
$contratada = $linha["Contratada"] ? $linha["Contratada"] : "";
$servico = $linha["Servico"] ? $linha["Servico"] : "";
$disponibilidade = $linha["Disponibilidade"] ? $linha["Disponibilidade"] : ""; 
$valor = $linha["Valor"] ? $linha["Valor"] : "";
$data = $linha["Data"] ? $linha["Data"] : "";

echo "<!-- Name input-->
<div class='form-floating mb-3'>
    <input class='form-control' id='name' type='text' name='numero_contrato'  value='$numero_contrato'/>
    <label for='name'>Número do contrato</label>
</div>

<div class='form-floating mb-3'>
    <input class='form-control' id='mail' type='text' name='contratante' value='$contratante' />
    <label for='email'>Contratante</label>
</div>

<div class='form-floating mb-3'>
    <input class='form-control' id='mail' type='text' name='contratada' value='$contratada' />
    <label for='email'>Contratada</label>
</div>
<div class='form-floating mb-3'>
    <select class='form-control' name='servico'>";

        if ($servico == "B") { echo "<option value='B' selected>Babá</option>"; }
        else { echo "<option value='B'>Babá</option>"; }

        if ($servico == "FB") { echo "<option value='FB' selected>Folguista de Babá</option>"; }
        else { echo "<option value='FB'>Folguista de Babá</option>"; }

        if ($servico == "D") { echo "<option value='D' selected>Doméstica</option>"; }
        else { echo "<option value='D'>Doméstica</option>"; }

        if ($servico == "F") { echo "<option value='F' selected>Faxineira</option>"; }
        else { echo "<option value='F'>Faxineira</option>"; }

        if ($servico == "COZ") { echo "<option value='COZ' selected>Cozinheira</option>"; }
        else { echo "<option value='COZ'>Cozinheira</option>"; }

        if ($servico == "CUI") { echo "<option value='CUI' selected>Cuidadora</option>"; }
        else { echo "<option value='CUI'>Cuidadora</option>"; }

        if ($servico == "FC") { echo "<option value='FC' selected>Folguista de Cuidadora</option>"; }
        else { echo "<option value='FC'>Folguista de Cuidadora</option>"; }

    echo "</select>
    <label for='name'>Serviço</label>
</div>
<div class='form-floating mb-3'>
    <select class='form-control' name='disponibilidade'>";

        if($disponibilidade == "MS") { echo "<option value='MS' selected>Mensal - Semanal</option>"; }
        else { echo "<option value='MS'>Mensal - Semanal</option>"; }

        if($disponibilidade == "MQ") { echo "<option value='MQ' selected>Mensal - Quinzenal</option>"; }
        else { echo "<option value='MQ'>Mensal - Quinzenal</option>"; }

        if($disponibilidade == "FSCF") { echo "<option value='FSCF' selected>Final de Semana - Com feriados</option>"; }
        else { echo "<option value='FSCF'>Final de Semana - Com feriados</option>"; }

        if($disponibilidade == "FSSF") { echo "<option value='FSSF' selected>Final de Semana - Sem feriados</option>"; }
        else { echo "<option value='FSSF'>Final de Semana - Sem feriados</option>"; }

    echo "</select>
    <label for='name'>Disponibilidade</label>
</div>
<!-- Email address input-->
<div class='form-floating mb-3'>
    <input class='form-control' id='mail' type='text' name='valor' value='$valor'/>
    <label for='email'>Valor</label>
</div>

<div class='form-floating mb-3'>
    <input class='form-control' id='mail' type='date' name='data' value='$data'/>
    <label for='email'>Data</label>
</div>
</fieldset>

<input type='hidden' name='ID' value='$id'>

<div class='d-grid'><input class='btn btn-success' type='submit' value='Cadastrar'></div>";

?>

</form>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

