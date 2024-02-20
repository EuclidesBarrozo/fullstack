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
                        <form action="cadastro_contrato.php" method="post">
                            <fieldset><legend>Dados contratuais</legend>
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name="numero_contrato" required onblur="verificarSeNaoTaVazio(this)"/>
                                <label for="name">Número do contrato*</label>
                                <p id='aviso'></p>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="mail" type="text" name="contratante" required oninput="formatCPF(this)" onblur="V_cpf1(this)"/>
                                <label for="email">Contratante*</label>
                                <p id='l_cpf'></p>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="mail" type="text" name="contratada" required oninput="formatCPF(this)" onblur="V_cpf2(this)"/>
                                <label for="email">Contratada*</label>
                                <p id='l_cpf2'></p>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" name="servico" required>
                                    <option value="B">Babá</option>
                                    <option value="FB">Folguista de Babá</option>
                                    <option value="D">Doméstica</option>
                                    <option value="F">Faxineira</option>
                                    <option value="Coz">Cozinheira</option>
                                    <option value="Cui">Cuidadora</option>
                                    <option value="FC">Folguista de Cuidadora</option>
                                </select>
                                <label for="name">Serviço*</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" name="disponibilidade" required>
                                    <option value="MS">Mensal - Semanal</option>
                                    <option value="MQ">Mensal - Quinzenal</option>
                                    <option value="FSCF">Final de Semana - Com feriados</option>
                                    <option value="FSSF">Final de Semana - Sem feriados</option>
                                </select>
                                <label for="name">Disponibilidade*</label>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="mail" type="text" name="valor" onblur="verificarSeNaoTaVazio(this)" required/>
                                <label for="email">Valor*</label>
                                <p id='aviso'></p>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="mail" type="date" name="data" onblur="verificarSeNaoTaVazio(this)" required/>
                                <label for="email">Data*</label>
                                <p id='aviso'></p>
                            </div>
                            </fieldset>

                            <div class="d-grid"><input class="btn btn-success" type="submit" value="Cadastrar"></div>

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
        <script>
            function formatCPF(campo) {
                let cpf = campo.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                cpf = cpf.substring(0, 11); // Limita o CPF a 11 dígitos (sem formatação)
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o hífen
                campo.value = cpf; // Define o valor formatado no campo de entrada
            }

            function V_cpf1(campo){
                if(campo.value == ''){
                    document.getElementById("l_cpf").innerHTML = '* Campo obrigatório';
                    document.getElementById("l_cpf").style.color = 'red';
                }
                else if(campo.value.replace(/\D/g, '').length != 11){
                    document.getElementById("l_cpf").innerHTML = '* Verifique se possui os 11 números do CPF';
                    document.getElementById("l_cpf").style.color = 'red';
                }

                else{
                    document.getElementById("l_cpf").innerHTML = "";
                }
            }
            function V_cpf2(campo){
                if(campo.value == ''){
                    document.getElementById("l_cpf2").innerHTML = '* Campo obrigatório';
                    document.getElementById("l_cpf2").style.color = 'red';
                }
                else if(campo.value.replace(/\D/g, '').length != 11){
                    document.getElementById("l_cpf2").innerHTML = '* Verifique se possui os 11 números do CPF';
                    document.getElementById("l_cpf2").style.color = 'red';
                }

                else{
                    document.getElementById("l_cpf2").innerHTML = "";
                }
            }

            function verificarSeNaoTaVazio(campo){
                let el = campo.parentElement.querySelector("#aviso");
                if (campo.value.trim().replace(/\D/g, '') == 0){
                    el.innerHTML = '* Campo obrigatório';
                    el.style.color = 'red';
                }
                else{
                    el.innerHTML = "";
                }
            }
        </script>
    </body>
</html>
