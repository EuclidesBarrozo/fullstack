<?php
    class Conexao{
        public $conexao = "";

    private function criarConexao(){       
        try{//tentará fazer os comandos dentro dessa chave
            $conn = new MySQli('localhost','root','','banco');
            return $conn;
        }catch(Exception $e){//caso encontre algum erro dentro do try o catch é realizado 
            die("Connection failed: " . $conn->connect_error);
        }
    }
    public function inserir($c){
        try{
            $conexao = $this->criarConexao();
            mysqli_query($conexao,$sql);
        }catch(Exception $e){
            die("Connection failed: " . $e->getMessage());
        }finally{
            mysqli_close($conexao);//fechar a conexão
        }
    }
    public function selecionar($sql){
        try{
            $conexao = $this->criarConexao();
            $result = mysqli_query($conexao,$sql);
            $linha = mysqli_fetch_array($result);
            return $linha; 
        }catch(Exception $e){
            die("Connection failed: " . $e->getMessage());
        }finally{
            mysqli_close($conexao);//fechar a conexão
        }
    }
    public function dml($sql){
        try{
            $conexao = $this->criarConexao();
            mysqli_query($conexao,$sql);
            if(mysqli_affected_rows($conexao))
                return true;
            else
                return false;
        }catch(Exception $e){
            die("Connection failed: " . $e->getMessage());
            return false;
        }finally{
            mysqli_close($conexao);//fechar a conexão
        }
    }



    }

?>