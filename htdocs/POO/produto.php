<?php
    class Produto{
        private $nome = "";
        private $quantidade = 0;
        private $preco = 0;
        //CONSTRUTOR
        public function __construct($n, $q, $p){
            $this->nome = $n;
            $this->quantidade = $q;
            $this->preco = $p;
        }
        //MÉTODO
        public function faturamentoMax(){
            $faturamentoMax = $this->quantidade * $this->preco;
            return $faturamentoMax;
        }
        //SET -> ATRIBUIR
        //GET -> RETORNAR
        //ENCAPSULAMENTO -> acessar os atributos apenas por meio dos métodos
        public function setNome($n){
            $this->nome = $n;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setQuantidade($q){
            $this->quantidade = $q;
        }
        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setPreco($p){
            $this->preco = $p;
        }
        public function getPreco(){
            return $this->preco;
        }

        
    }    
?>