<?php


class Sabor {
    private $nome;
    private $descricao;
    private $ingredientes;
    
    function __construct() {
        
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getIngredientes() {
        return $this->ingredientes;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }


}
