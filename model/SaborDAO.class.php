<?php

    require_once("../model/Sabor.class.php");
    require_once("../util/ConectaPDO.php");
class SaborDAO {
    
    function __construct() {
    
    }
    
    public function cadastra($sabor){
        try{
            $conectaPDO = new ConectaPDO();
            
            $conexao = $conectaPDO->abreConexao();
            
            $sql = $conexao->prepare("INSERT INTO sabor(nome, descricao, ingredientes)
                                                        VALUES (:nome, :descricao, :ingredientes)");
            
            $sql->bindValue(":nome", $sabor->getNome());
            $sql->bindValue(":descricao", $sabor->getDescricao());
            $sql->bindValue(":ingredientes", $sabor->getIngredientes());
            
            $sql->execute();
            
            
            $conectaPDO->fechaConexao();
            
            header("Location: ../view/listaProdutos.php");
            
        } catch (Exception $e) {

        }
    }
    
}
