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
        <title>Página Inicial</title>
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
                        <h2 class="mt-0">CADASTRO DE CLIENTES</h2>
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
                        <form name="form1" action="cadastro_cliente.php" method="post">
                            <fieldset><legend>Dados Pessoais</legend>
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="nome" id="name" type="text" onblur="V_nome(this)" required />
                                <label for="name">Nome*</label>
                                <p id='l_nome'></p>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="mail" type="text" name="rg" onblur='V_rg(this)' oninput='formatRg(this)' required>
                                <label for="email">RG*</label>
                                <p id='l_rg'></p>
                            </div>

                            <div class="form-floating mb-3" >
                                <input class="form-control" id="mail" type="text" name="cpf" onblur="V_cpf(this)" oninput="formatCPF(this)" required/>
                                <label for="email">CPF*</label>
                                <p id="l_cpf"></p>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" name="telefone1" onblur="V_tel1(this)" onkeyup="formatNumero(this)"/>
                                <label for="phone">Telefone*<span style="font-size:x-small;">(Whatsapp)</span></label>
                                <p id="l_tel1"></p>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" name="telefone2" onblur="V_tel2(this)" onkeyup="formatNumero(this)"/>
                                <label for="phone">Telefone<span style="font-size:x-small;"> 2</span></label>
                                <p id="l_tel2"></p>
                                
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="mail" type="date" name="data_nascimento" required>
                                <label for="email">Data de Nascimento*</label>
                                <p id="lbl_data"></p>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text"  name="profissao"/>
                                <label for="name">Profissão</label>
                            </div>

                            
                        </fieldset>
                            <hr>
                            <!-- RUA, NÚMERO, BAIRRO, CIDADE, ESTADO, CEP -->
                            <fieldset><legend>Endereço</legend>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text"  name="rua" onblur="V_rua(this)" required/>
                                    <label for="name">Rua*</label>
                                    <p id="lbl_rua"></p>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="number" min="0" name="numero" onblur='V_num(this)' required/>
                                    <label for="name">Número*</label>
                                    <p id='lbl_num'></p>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text"  name="bairro" onblur='V_bairro(this)' required/>
                                    <label for="name">Bairro*</label>
                                    <p id="lbl_bairro"></p>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text"  name="cidade" onblur='V_cidade(this)' required/>
                                    <label for="name">Cidade*</label>
                                    <p id='lbl_cidade'></p>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text" value="Ceará" name="estado" onblur='V_estado(this)' required/>
                                    <label for="name">Estado*</label>
                                    <p id="lbl_estado"></p>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text" name="cep" />
                                    <label for="name">CEP</label>
                                </div>

                                <hr>
                            <!-- RUA, NÚMERO, BAIRRO, CIDADE, ESTADO, CEP -->
                            
                                <fieldset><legend>Solicitação Profissional</legend>
                                <div>
                                    
                                <table>
                                    <tr>
                                        <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="D" type="checkbox" value=true/> 
                                    <label class="form-check-label" for="name">Doméstica</label>

                                    
                                </div>
                            </td>
                            <td>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" name="B" type="checkbox" value=true/>
                                    <label class="form-check-label" for="name">Babá</label>
                                </div>
                            </td>

                            <td>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" name="FB" type="checkbox" value=true/>
                                    <label class="form-check-label" for="name">Folguista de Babá</label>
                                </div>
                            </td>
                        </tr>

                                <tr>
                                    <td>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" name="F" type="checkbox" value=true/>
                                    <label class="form-check-label" for="name">Faxineira</label>
                                </div>
                            </td>
                            <td>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" name="Coz" type="checkbox" value=true/>
                                    <label class="form-check-label" for="name">Cozinheira</label>
                                </div>
                            </td>

                            <td>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" name="Cui" type="checkbox" value=true/>
                                    <label class="form-check-label" for="name">Cuidadora</label>
                                </div>
                            </td>
                        </tr>

                            <tr>
                                <td>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" name="FC" type="checkbox" value=true/>
                                    <label class="form-check-label" for="name">Folguista de Cuidadora</label>
                                </div>
                            </td>
                        </tr>
                            </table>
                            <br>
                            <div class="form-floating mb-3">
                                <select class="form-control" name="disponibilidade" required>
                                    <option value="MS">Mensal - Semanal</option>
                                    <option value="MQ">Mensal - Quinzenal</option>
                                    <option value="FSCF">Final de Semana - Com feriados</option>
                                    <option value="FSSF">Final de Semana - Sem feriados</option>
                                </select>
                                <label for="name">Disponibilidade*</label>
                            </div>

                        </fieldset>
                

                            <!-- Message input-->
                        

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" style="height: 10rem" name="observacao"></textarea>
                                <label for="message">Observações</label>
                            </div>

                            <div class="d-grid"><input class="btn btn-success" type="submit" value="Cadastrar"></div>
                            <div class="d-grid mt-2">
                            <a href='inicio.html' class='btn btn-warning'>Página Inicial</a></div>
                        
                            
                        </div>
      
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
        
        function formatNumero(campo) {
            let telefone = campo.value;
            telefone = telefone.replace(/\D/g, ""); // remove caracteres não numéricos
            telefone = telefone.replace(/(\d{0})(\d)/, "$1($2"); // insere primeiro ponto
            telefone = telefone.replace(/(\d{2})(\d)/, "$1)$2"); // insere segundo ponto
            campo.value = telefone;
        }

        function formatCPF(campo) {
            let cpf = campo.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            cpf = cpf.substring(0, 11); // Limita o CPF a 11 dígitos (sem formatação)
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona o hífen
            campo.value = cpf; // Define o valor formatado no campo de entrada
        }

        function V_cpf(campo){
            if(campo.value == ''){
                document.getElementById("l_cpf").innerHTML = '* Campo obrigatório';
                //campo.value = 'campo obrigatório';
                document.getElementById("l_cpf").style.color = 'red';
            }
            else if(campo.value.replace(/\D/g, '').length != 11){
                document.getElementById("l_cpf").innerHTML = '* Verifique se possui os 11 números do seu CPF';
                document.getElementById("l_cpf").style.color = 'red';
            }

            else{
                document.getElementById("l_cpf").innerHTML = "";
            }
        }
        
        function V_tel1(campo){
            if(campo.value == ''){
                document.getElementById("l_tel1").innerHTML = '* Campo obrigatório';
                document.getElementById("l_tel1").style.color = 'red';
            }
            else if(campo.value.replace(/\D/g, '').length < 10){
                document.getElementById("l_tel1").innerHTML = '* Deve ser digitado o seu número, incluindo o DDD. (88123456789)';
                document.getElementById("l_tel1").style.color = 'red';
            }

            else{
                document.getElementById("l_tel1").innerHTML = "";
            }
        }

        function V_tel2(campo){
            if(campo.value.replace(/\D/g, '').length > 0 && campo.value.replace(/\D/g, '').length < 10){
                document.getElementById("l_tel2").innerHTML = '* Deve ser digitado o seu número, incluindo o DDD. (88123456789)';
                document.getElementById("l_tel2").style.color = 'red';
            }

            else{
                document.getElementById("l_tel2").innerHTML = "";
            }
        }

        function V_nome(campo){
            if(campo.value.trim() == ''){
                document.getElementById("l_nome").innerHTML = '* Campo obrigatório';
                document.getElementById("l_nome").style.color = 'red';
            }
            else{
                document.getElementById("l_nome").innerHTML = '';
            }
        }

        function formatRg(campo){
            let rg = campo.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            campo.value = rg; // Define o valor formatado no campo de entrada
        }

        function V_rg(campo){
            if(campo.value.trim() == "" || campo.value.trim().lenght < 8){
                document.getElementById("l_rg").innerHTML = "* Verifique se seu RG está correto";
                document.getElementById("l_rg").style.color = 'red';
            }
            else{
                document.getElementById("l_rg").innerHTML = "";
            }
        }

        function V_rua(campo){
            if (campo.value.trim() == ""){
                document.getElementById("lbl_rua").innerHTML = "* Campo obrigatório";
                document.getElementById("lbl_rua").style.color = 'red';
            }
            else{
                document.getElementById("lbl_rua").innerHTML = "";
            }
        }

        function V_num(campo){
            if (campo.value.trim() == ""){
                document.getElementById("lbl_num").innerHTML = "* Campo obrigatório";
                document.getElementById("lbl_num").style.color = 'red';
            }
            else{
                document.getElementById("lbl_num").innerHTML = "";
            }
        }

        function V_bairro(campo){
            if (campo.value.trim() == ""){
                document.getElementById("lbl_bairro").innerHTML = "* Campo obrigatório";
                document.getElementById("lbl_bairro").style.color = 'red';
            }
            else{
                document.getElementById("lbl_bairro").innerHTML = "";
            }
        }

        function V_cidade(campo){
            if (campo.value.trim() == ""){
                document.getElementById("lbl_cidade").innerHTML = "* Campo obrigatório";
                document.getElementById("lbl_cidade").style.color = 'red';
            }
            else{
                document.getElementById("lbl_cidade").innerHTML = "";
            }
        }

        function V_estado(campo){
            if (campo.value.trim() == ""){
                document.getElementById("lbl_estado").innerHTML = "* Campo obrigatório";
                document.getElementById("lbl_estado").style.color = 'red';
            }
            else{
                document.getElementById("lbl_estado").innerHTML = "";
            }
        }
    </script>
    </body>
</html>
