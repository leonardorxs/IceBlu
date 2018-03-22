<?php

class ConectaPDO {

    private $conexao;

    public function abreConexao() {
        try {

            $conexao = new PDO('mysql:host=localhost;dbname=icebluphp', 'root', '');

            return $conexao;
        } catch (PDOException $e) {
            echo "Erro!" . $e->getMessage();
            die();
        }
    }

    public function fechaConexao() {
        $conexao = null;
    }

}
?>

