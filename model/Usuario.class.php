<?php

class Usuario {

    private $id;
    private $login;
    private $senha;
    private $nome;
    private $sobrenome;
    private $sexo;
    private $cpf;
    private $dataNasc;
    private $email;
    private $telefone;
    private $celular;
    private $nivel;
    private $ativo;
    private $endereco;

    function __construct($endereco) {
        $this->endereco = $endereco;
    }
    

    public function getId() {
        return $this->id;
    }
    public function getLogin() {
        return $this->login;
    }
    public function setLogin($login) {
        $this->login = $login;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getSobrenome() {
        return $this->sobrenome;
    }
    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }
    public function getSexo() {
        return $this->sexo;
    }
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getDataNasc() {
        return $this->dataNasc;
    }
    public function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function getCelular() {
        return $this->celular;
    }
    public function setCelular($celular) {
        $this->celular = $celular;
    }
    public function getNivel() {
        return $this->nivel;
    }
    public function getAtivo() {
        return $this->ativo;
    }
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    
    public function getEndereco() {
        return $this->endereco;
    }

}
?>
