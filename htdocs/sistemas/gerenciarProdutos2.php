<?php
session_start();//inicia a sessão
if (isset($_SESSION["atualizar"])){//existe uma sessão
    if($_SESSION["atualizar"] == "1"){//verifica se sessão é igual a 1
        unset($_SESSION["atualizar"]);//excluir sessão
        echo "<script>alert('Atualização feita com sucesso');</script>";
    }
    else if ($_SESSION["atualizar"] == "2"){//verifica se sessão é igual a 2
        unset($_SESSION["atualizar"]);//excluir sessão
        echo "<script>alert('Erro ao atualizar produto');</script>";
    }   
}else if (isset($_SESSION["excluir"])){//existe uma sessão
    if($_SESSION["excluir"] == "1"){//verifica se sessão é igual a 1
        unset($_SESSION["excluir"]);//excluir sessão
        echo "<script>alert('Produto excluido com sucesso');</script>";
    }
    else if ($_SESSION["excluir"] == "2"){//verifica se sessão é igual a 2
        unset($_SESSION["excluir"]);//excluir sessão
        echo "<script>alert('Erro ao excluir produto');</script>";
    }   
}else if (isset($_SESSION["cadastrar"])){//existe uma sessão
    if($_SESSION["cadastrar"] == "1"){//verifica se sessão é igual a 1
        unset($_SESSION["cadastrar"]);//excluir sessão
        echo "<script>alert('Produto cadastrado com sucesso');</script>";
    }
    else if ($_SESSION["cadastrar"] == "2"){//verifica se sessão é igual a 2
        unset($_SESSION["cadastrar"]);//excluir sessão
        echo "<script>alert('Erro ao cadastrar produto');</script>";
    }   
}
session_destroy();
?>
<section class="page-section" id="contact">
                <div class="row mb-5 text-center d-none d-lg-block">
                    <div class="col-lg-12 col-sm-12">
                        <div class="m-2">
                            
                        <button class='btn btn-warning' onclick="abrirModalFiltros()">Filtrar Produtos</button>
                            
                        </div>
                        <button class='btn btn-warning d-none' id='btnRemoverFiltros' onclick='removerFiltros(this)'>Remover Filtros</button>
                    </div>
                </div>
<!--
                <div class="row mb-3 text-center d-lg-none d-md-none d-xl-none">
                    
                    <div class="col-lg-12 mb-3">
                        <button class='btn btn-warning' onclick="abrirModalFiltros()">Filtrar Produtos1</button>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <a href='inicio.html' class='btn btn-warning'>Página Inicial2</a>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <button class='btn btn-warning d-none' id='btnRemoverFiltros' onclick='removerFiltros(this)'>Remover Filtros3</button>
                    </div>
                </div>

                <div class='paginas mb-3'>
                    <i class='bi bi-caret-left-fill'></i>
                </div>

                <div class='text-center'>
                    <label class='mb-3 d-none' id='qtdRegistros'></label>-->
<?php
include_once("conexao.php");
include_once("head.php");

//$sql = "SELECT * FROM produtos LIMIT 0, 10";
$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "<div class='container card mt-2' >
    <h2>Lista de produtos</h2>
    
    <a href='produtos.html' class='btn btn-primary'>Cadastrar</a>
    <a href='dashboard.php' class='btn btn-success mt-2 mb-2' >Estatísticas</a>

    <table class='table table-striped table-sm' id='tabelaPrincipal'>
    <tr>
    <th>ID</th>
    <th>Produto</th>
    <th>Valor</th>
    <th>Quantidade</th>
    <th>Validade</th>
    <th>Editar</th>
    <th>Deletar</th>
    <th>Vendas</th>
    </tr>";
    while($linha = mysqli_fetch_array($result)){
        echo "<tr id='trCadastro'>
        
        <td data-label='ID'> $linha[id]</td>
        <td data-label='Produto'> $linha[produto]</td>
        <td data-label='Valor'>$linha[valor]</td>
        <td data-label='Quantidade'>$linha[quantidade]</td>
        <td data-label='Validade'>$linha[validade]</td>

        <input type='hidden' id='produto$linha[id]' value= '$linha[produto]'>
        
        <td><button class='btn btn-warning' onclick='abrirModalEditar($linha[id])'>Editar</button></td>
        
        <form action = 'excluir.php' method='POST'>
        <td><input class='btn btn-danger' type='submit' name='comando' value='Deletar' onclick=\"return confirm('Deseja deletar o produto')\" ></td>
        <input type='hidden' name='id' value= '$linha[id]'>
        </form>

        <td><button class='btn btn-success' onclick='abrirModalVendas($linha[id])'>Vendas</button></td>
        
        </tr>";
    }
    echo "</table>
                         
"; 
}
else {
    echo "0 resultado";
}
?>


<!--modal Filtros-->
<div class='modal fade' id='modalFiltro'>
    <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Filtrar Produtos</h5>
            </div>
            <div class='modal-body'>
                <h5>Filtrar por...</h5>
                <div class='form-floating mb-3'>
                    <input type='text' id='filtroId' class='form-control'>
                    <label for='filtroId'>ID</label>
                </div>
                <div class='form-floating mb-3'>
                    <input type='text' id='filtroProduto' class='form-control'>
                    <label for='filtroProduto'>Produto</label>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' onclick='fecharModalFiltros()'>Fechar</button>
                <button type='button' class='btn btn-primary' onclick='aplicarFiltros()'>Aplicar Filtros</button>
            </div>
        </div>
    </div>
</div>

<!--modal Editar-->
<div class='modal fade' id='modalEditar' >
    <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
        <form action="atualizar.php" method="POST">
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Editar Produtos</h5>
            </div>
            <div class='modal-body'>
                <div class='form-floating mb-3'>
                    <input type='text' id='editarId' name='id' class='form-control' >
                    <label >ID</label>
                </div>
                <div class='form-floating mb-3'>
                    <input type='text' id='editarProduto'  name="produto" class='form-control'>
                    <label >Produto</label>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' onclick='fecharModalEditar()'>Fechar</button>
                <input type='submit' class='btn btn-primary' value="Editar">
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Vendas-->
<div class='modal fade' id='modalVendas' >
    <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
        <form action="vendas.php" method="POST">
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Vendas de Produtos</h5>
            </div>
            <div class='modal-body'>
                <div class='form-floating mb-3'>
                    <input type='text' id='vendasId' name='id' class='form-control' >
                    <label >ID</label>
                </div>
                <div class='form-floating mb-3'>
                    <input type='text' id='vendasProduto'  name="produto" class='form-control'>
                    <label >Produto</label>
                </div>
                <div class='form-floating mb-3'>
                    <input type='number' id='vendasQuantidade'  name="quantidade" class='form-control'>
                    <label >Quantidade vendida</label>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' onclick='fecharModalVendas()'>Fechar</button>
                <input type='submit' class='btn btn-primary' value="Vender">
            </div>
        </form>
        </div>
    </div>
</div>

</section>
        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->
        <script src="bootstrap.bundle.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="jquery.js"></script>

        <!--Script de edição-->
        <script>
            function abrirModalEditar(id){
                //limparCamposEditar();
                $("#modalEditar").modal("show");
                //obtem o input hidden produtoid
                produto = document.getElementById("produto"+id);
                //obtem os inputs do modal
                editarId = document.getElementById("editarId");
                editarProduto = document.getElementById("editarProduto");
                //preenche o modal
                editarId.value = id;
                editarProduto.value = produto.value;
            }function fecharModalEditar(){
                $("#modalEditar").modal("hide");
            }

            function abrirModalVendas(id){
                limparCamposVendas();
                $("#modalVendas").modal("show");
                //obtem o input hidden produtoid
                produto = document.getElementById("produto"+id);
                //obtem os inputs do modal
                vendasId = document.getElementById("vendasId");
                vendasProduto = document.getElementById("vendasProduto");
                //preenche o modal
                vendasId.value = id;
                vendasProduto.value = produto.value;
            }function fecharModalVendas(){
                $("#modalVendas").modal("hide");
            }

            function limparCamposVendas(){
                document.getElementById("vendasQuantidade").value = "";
            }
   
        </script>
        
        <!-- Script de filtros -->
        <script>
            // Abre o modal filtros
            function abrirModalFiltros(){
                limparCampos();
                $("#modalFiltro").modal("show");   
            }           
            // Fecha o modal filtros
            function fecharModalFiltros(){
                $("#modalFiltro").modal("hide");
            }
            
            // Limpa campos do modal
            function limparCampos(){
                document.getElementById("filtroId").value = "";
                document.getElementById("filtroProduto").value = "";
            }
            
            const btnRemoverFiltros = document.querySelectorAll("#btnRemoverFiltros");
            

            // Aplica os filtros
            function aplicarFiltros(){

                /* Armazena os valores a serem procurados */
                let idProduto = document.getElementById("filtroId").value;
               
                let produto = document.getElementById("filtroProduto").value;
                /* Tabela gerada pelo PHP */
                let tabela = document.getElementById("tabelaPrincipal");

                let json = {};
                
                if (idProduto != ""){json.idProduto = idProduto;}
                if (produto != ""){json.produto = produto;}

                if (idProduto != "" || produto != "")
                {
                    $.ajax({
                        url: "./querys.php",
                        method: "POST",
                        data: {filtroTabela : "sim", tabela : "produtos", filtroData : JSON.stringify(json)},
                        success: (data) => {
                            tabela.innerHTML = data;

                            btnRemoverFiltros[0].classList.remove("d-none");
                            
                            $("#modalFiltro").modal("hide");
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
                    data: {tabelaNormal: "sim", tabela : "produtos", removerFiltro: "sim"},
                    success: (data) => {
                        tabela.innerHTML = data;
                        btnRemoverFiltros[0].classList.add("d-none");  
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

            

            // Retorna quantidade de registros encontrados do filtro ou de uma tabela
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
        </script>       
    </body>
</html>
