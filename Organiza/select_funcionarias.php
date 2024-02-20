<?php 
    session_start();
    function verificarLogin(){
        if (!isset($_SESSION["user"])){
            header('Location:./index.html');
        }
    }
    verificarLogin();

    if (isset($_SESSION["result"]))
    {
        if($_SESSION["result"] == "1")
        {
            unset($_SESSION["result"]);
            echo "<script>alert('Cadastro feito com sucesso');</script>";
        }
        else if ($_SESSION["result"] == "2")
        {
            unset($_SESSION["result"]);
            echo "<script>alert('Erro ao cadastrar funcionaria');</script>";
        }
        else if ($_SESSION["result"] == "3")
        {
            unset($_SESSION["result"]);
            echo "<script>alert('Cadastro editado com sucesso');</script>";
        }
        else if ($_SESSION["result"] == "4")
        {
            unset($_SESSION["result"]);
            echo "<script>alert('Erro ao editar funcionaria');</script>";
        }
    }
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

        <!-- CSS para a versão mobile -->
        <link rel="stylesheet" href="style.css">
        
        
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
            <div class="container">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">LISTA DE FUNCIONARIAS</h2>
                        <hr class="divider" />
                        
                    </div>
                </div>
                
                <div class="row mb-5 text-center d-none d-lg-block">
                    <div class="col-lg-12 col-sm-12">
                        <div class="m-2">
                            <a href='funcionarias.php' class='btn btn-warning'>Cadastrar Funcionaria</a>
                            <button class='btn btn-warning' onclick="abrirModalFiltros()">Filtrar Funcionarias</button>
                            <a href='inicio.html' class='btn btn-warning'>Página Inicial</a>
                        </div>
                        <button class='btn btn-warning d-none' id='btnRemoverFiltros' onclick='removerFiltros(this)'>Remover Filtros</button>
                    </div>
                </div>
                <div class="row mb-3 text-center d-lg-none d-md-none d-xl-none">
                    <div class="col-lg-12 mb-3">
                        <a href='funcionarias.php' class='btn btn-warning'>Cadastrar Funcionaria</a>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <button class='btn btn-warning' onclick="abrirModalFiltros()">Filtrar Funcionarias</button>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <a href='inicio.html' class='btn btn-warning'>Página Inicial</a>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <button class='btn btn-warning d-none' id='btnRemoverFiltros' onclick='removerFiltros(this)'>Remover Filtros</button>
                    </div>
                </div>

                <div class='paginas mb-3'>
                    <i class='bi bi-caret-left-fill'></i>
                </div>

                <div class='text-center'>
                    <label class='mb-3 d-none' id='qtdRegistros'></label>



<?php

include_once("conexao.php");

$sql = "SELECT funcionarios.ID, funcionarios.Nome, funcionarios.Telefone1, funcionarios_solicitacao.Disponibilidade, funcionarios_solicitacao.Baba, funcionarios_solicitacao.Cozinheira, funcionarios_solicitacao.Cuidadora, funcionarios_solicitacao.Domestica, funcionarios_solicitacao.Faxineira, funcionarios_solicitacao.F_Baba, funcionarios_solicitacao.F_Cuidadora FROM funcionarios, funcionarios_solicitacao WHERE funcionarios.ID_Solicitacao = funcionarios_solicitacao.ID LIMIT 0, 10";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "
    <table class='table table-striped table-sm' id='tabelaPrincipal'>
    <tr>
    
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

    while($linha = mysqli_fetch_array($result)){
        echo "<tr id='trCadastro'>
        <form action='update_funcionaria.html.php' method='POST'>
        <td data-label='Nome'>".$linha["Nome"]."</td>
        <td data-label='Telefone'>".$linha["Telefone1"]."</td>
        <td data-label='Disponibilidade'>".$linha["Disponibilidade"]."</td>
        <td data-label='Baba'>".(($linha["Baba"] == 0) ? "Não" : "Sim")."</td>
        <td data-label='Cozinheira'>".(($linha["Cozinheira"] == 0) ? "Não" : "Sim")."</td>
        <td data-label='Cuidadora'>".(($linha["Cuidadora"] == 0) ? "Não" : "Sim")."</td>
        <td data-label='Domestica'>".(($linha["Domestica"] == 0) ? "Não" : "Sim")."</td>
        <td data-label='Faxineira'>".(($linha["Faxineira"] == 0) ? "Não" : "Sim")."</td>
        <td data-label='F_Baba'>".(($linha["F_Baba"] == 0) ? "Não" : "Sim")."</td>
        <td data-label='F_Cuidadora'>".(($linha["F_Cuidadora"] == 0) ? "Não" : "Sim")."</td>
        <td><input class='btn
        btn-warning' type='submit' name='comando'
        value='Editar' ></td>
        <input type='hidden' name='ID' value= '".$linha
        ["ID"]."'>
        </form>
        <!--Ele está constantemente atualizando-->
        </tr>";
    
        
    }
    echo "<tfoot></tfoot>
    </table>";
    } else {
    echo "0 resultado";
    }
    
?>

</div>
                </div>
            </div>
                        
        </section>
        <!-- Modal de filtro -->
<div class="modal fade" id="modalFiltro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Filtrar Funcionarias</h5>
      </div>
      <div class="modal-body">
        <h5>Filtrar por...</h5>
        <div class="form-floating mb-3">
            <input type="text" id="txtCPF" class="form-control">
            <label for="txtCPF">CPF</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id='txtCidade' class="form-control">
            <label for="txtCidade">Cidade</label>
        </div>
        <div class="form-floating mb-3">
            <select type="text" id="selServico" class="form-control">
                <option value="todos">Selecione</option>
                <option value="D">Doméstica</option>
                <option value="B">Babá</option>
                <option value="FB">Folguista de Babá</option>
                <option value="F">Faxineira</option>
                <option value="Coz">Cozinheira</option>
                <option value="Cui">Cuidadora</option>
                <option value="FC">Folguista de Cuidadora</option>
            </select>
            <label for="selServico">Serviço</label>
        </div>
        <div class="form-floating mb-3">
            <select type="text" id='selDisponibilidade' class="form-control">
                <option value="todos">Selecione</option>
                <option value="MS">Mensal - Semanal</option>
                <option value="MQ">Mensal - Quinzenal</option>
                <option value="FSCF">Final de Semana - Com feriados</option>
                <option value="FSSF">Final de Semana - Sem feriados</option>
            </select>
            <label for="selDisponibilidade">Disponibilidade</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="fecharModalFiltros()">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="aplicarFiltros()">Aplicar Filtros</button>
      </div>
    </div>
  </div>
</div>
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

        <script src='./js/jQuery.js'></script>

        <!-- Script de filtros -->
        <script>

            const btnRemoverFiltros = document.querySelectorAll("#btnRemoverFiltros");

            // Troca os '1' na tabela por sim e os '0' por não
            function arrumarTabela(){
                const trCadastros = document.querySelectorAll("#trCadastro");
                
                for(let i = 0; i < trCadastros.length; i++){
                    let tr = trCadastros[i].children;

                    for (let j = 0; j < tr.length; j++){
                        let element = tr[j];
                        if(element.innerHTML == "0"){
                            element.innerHTML = "Não";
                        }
                        else if (element.innerHTML == "1"){
                            element.innerHTML = "Sim";
                        }
                    }
                }
            }

            // Abre o modal filtros
            function abrirModalFiltros(){
                limparCampos();
                $("#modalFiltro").modal("show");
            }

            // Fecha o modal filtros
            function fecharModalFiltros(){
                $("#modalFiltro").modal("hide");
            }

            // Aplica os filtros
            function aplicarFiltros(){
                /* Armazena os valores a serem procurados */
                let cpf = document.getElementById("txtCPF").value;
                let cidade = document.getElementById("txtCidade").value;
                let servico = document.getElementById("selServico").value == "todos" ? "" : document.getElementById("selServico").value;
                let disponibilidade = document.getElementById("selDisponibilidade").value == "todos" ? "" : document.getElementById("selDisponibilidade").value;

                /* Tabela gerada pelo PHP */
                let tabela = document.getElementById("tabelaPrincipal");
                
                let json = {};

                if (cpf != ""){json.cpf = cpf;}
                if (cidade != ""){json.cidade = cidade;}
                if (servico != ""){json.servico = servico;}
                if (disponibilidade != ""){json.disponibilidade = disponibilidade;}
                
                if (cpf != "" || cidade != "" || servico != "" || disponibilidade != "")
                {
                    $.ajax({
                        url: "./querys.php",
                        method: "POST",
                        data: {filtroTabela : "sim", tabela : "funcionarios", filtroData : JSON.stringify(json)},
                        success: (data) => {
                            tabela.innerHTML = data;

                            arrumarTabela()

                            for(i = 0; i < btnRemoverFiltros.length; i++){
                                btnRemoverFiltros[i].classList.remove("d-none");
                            }

                            contarRegistros(true);
                            let paginas = document.getElementsByClassName("paginas")[0];
                            
                            let pf = paginas.children[paginas.childElementCount-1].cloneNode();
                            let pi = paginas.children[0].cloneNode();

                            paginas.innerHTML = "";

                            retornarQtdRegistros("sim").then((qtdRegistros) => {
                                qtdRegistros = Number(qtdRegistros);
                                qtdRegistros = Math.ceil(qtdRegistros / 10);
                                
                                paginas.appendChild(pi);

                                paginas.innerHTML += "<button class='btn btn-warning btn-sm' onclick='atualizarPagina(this)'>1</button>";

                                if (qtdRegistros > 1){
                                    for(i = 0; i < qtdRegistros - 1; i++){
                                        paginas.innerHTML += `<button class='item' onclick='atualizarPagina(this)'>${i+2}</button>`;
                                    }
                                }
                                
                                paginas.appendChild(pf);

                                $("#modalFiltro").modal("hide");
                            })
                        }
                    })
                }
            }

            // Remove os filtros e exibe a tabela normal
            function removerFiltros(){
                let tabela = document.getElementById("tabelaPrincipal");
                $.ajax({
                    url: "./querys.php",
                    method: "POST",
                    data: {tabelaNormal: "sim", tabela : "funcionarios", removerFiltro: "sim"},
                    success: (data) => {
                        tabela.innerHTML = data;

                        arrumarTabela()

                        for(i = 0; i < btnRemoverFiltros.length; i++){
                            btnRemoverFiltros[i].classList.add("d-none");
                        }

                        contarRegistros(false);
                        let paginas = document.getElementsByClassName("paginas")[0];
                        paginas.children[paginas.childElementCount - 1].remove();
                        configurarRolagemPaginas();
                    }
                })
            }

            // Conta quantos registro foram retornados e informa no topo da tabela
            function contarRegistros(a){
                let tabela = document.getElementById("tabelaPrincipal");
                let lblQtdRegistros = document.getElementById("qtdRegistros");
                
                retornarQtdRegistros("sim").then((qtdRegistros) => {
                    if (a == true){
                        if (qtdRegistros >= 0 && qtdRegistros < 2){
                            lblQtdRegistros.innerHTML = `${qtdRegistros} Registro encontrado`;
                        }
                        else{
                            lblQtdRegistros.innerHTML = `${qtdRegistros} Registros encontrados`;
                        }
                        
                        lblQtdRegistros.classList.remove("d-none");
                    }
                    else{
                        lblQtdRegistros.innerHTML = "";
                        lblQtdRegistros.classList.add("d-none");
                    }
                });
            }

            // Limpa campos do modal
            function limparCampos(){
                let cpf = document.getElementById("txtCPF").value = "";
                let cidade = document.getElementById("txtCidade").value = "";
                let servico = document.getElementById("selServico").value = "todos";
                let disponibilidade = document.getElementById("selDisponibilidade").value = "todos";
            }

            // Retorna quantidade de registros encontrados do filtro
            function retornarQtdRegistros(doFiltro){
                return new Promise(function(resolve, reject){
                    $.ajax({
                        url: "querys.php",
                        method: "POST",
                        data: {retornarQtdRegistros: "sim", doFiltro: doFiltro},
                        success: (data) => {
                            resolve(data);
                        },
                        error: (data) => {
                            reject(data)
                        }
                    })
                })   
            }

            // Atualiza pra pagina selecionada (parte 1)
            function atualizarPagina(elemento){
                let pag = elemento.innerHTML;
                let elParent = elemento.parentElement;

                if (!elemento.classList.contains('btn')){
                    
                    let tabelaPrincipal = document.getElementById("tabelaPrincipal");
                    $.ajax({
                        url: "querys.php",
                        method: "POST",
                        data: {atualizarPag: pag, tabela: "funcionarios"},
                        success: (data) => {
                            tabelaPrincipal.innerHTML = data;

                            arrumarTabela()
                            
                            for(i = 0; i < elParent.childElementCount; i++){
                                let el = elParent.children[i];
                                if (el.classList.contains('btn')){
                                    el.className = "item";
                                    break;
                                }
                            }

                            elemento.className = "btn btn-warning btn-sm";
                        }
                    })

                }
            }

            // Configuração da rolagem de páginas
            function configurarRolagemPaginas(){
                let paginas = document.getElementsByClassName("paginas")[0];
                let tabela = "funcionarios";
                let qtdPaginas = retornarQtdRegistros(tabela).then((qtd) => {

                    paginas.innerHTML = "<i class='bi bi-caret-left-fill'></i>";

                    paginas.innerHTML += "<button class='btn btn-warning btn-sm' onclick='atualizarPagina(this)'>1</button>";
                    
                    qtd = Number(qtd);
                    
                    if (qtd > 10){
                        qtd = Math.ceil(qtd / 10) - 1;

                        for(i = 0; i < qtd; i++){
                            paginas.innerHTML += `<button class='item' onclick='atualizarPagina(this)'>${i+2}</button>`;
                        }

                        paginas.innerHTML += "<i class='bi bi-caret-right-fill'></i>";
                    }
                })
            }

            $(document).ready(() => {
                configurarRolagemPaginas();
                $.ajax({
                    url: "querys.php",
                    method: "POST",
                    data: {removerFiltro: "sim"}
                })
            })
            
        </script>
    </body>
</html>