<?php
	
	class Produto{
                private $id;
		private $nome;
		private $descricao;
		private $peso;
		private $preco;
		private $quantidade;
		private $ativo;
		private $sabor;
                private $imagem;
                
                function __construct() {
                    $this->sabor;
                    $this->imagem;
                }
                
                function getId(){
                    return $this->id;
                }
                
                function setId($id){
                    $this->id = $id;
                }
                
                function getNome() {
                    return $this->nome;
                }

                function getDescricao() {
                    return $this->descricao;
                }

                function getPeso() {
                    return $this->peso;
                }

                function getPreco() {
                    return $this->preco;
                }

                function getQuantidade() {
                    return $this->quantidade;
                }

                function getAtivo() {
                    return $this->ativo;
                }

                function getSabor() {
                    return $this->sabor;
                }

                function getImagem() {
                    return $this->imagem;
                }

                function setNome($nome) {
                    $this->nome = $nome;
                }

                function setDescricao($descricao) {
                    $this->descricao = $descricao;
                }

                function setPeso($peso) {
                    $this->peso = $peso;
                }

                function setPreco($preco) {
                    $this->preco = $preco;
                }

                function setQuantidade($quantidade) {
                    $this->quantidade = $quantidade;
                }

                function setAtivo($ativo) {
                    $this->ativo = $ativo;
                }

                function setSabor($sabor) {
                    $this->sabor = $sabor;
                }

                function setImagem($imagem) {
                    $this->imagem = $imagem;
                }

	}
?>