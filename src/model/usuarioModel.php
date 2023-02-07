<?php

require_once('../utils/connect_db.php');

class UsuarioModel extends Connect
{
    private $tablePessoa;
    private $tableProfissional;
    private $cpf;
    private $nome;
    private $telefone;
    private $email;
    private $senha;
    private $tipoUsuario;

    function __construct()
    {
        parent::__construct();
        $this->tablePessoa = 'pessoa';
        $this->tableProfissional = 'profissional';
    }

    function cadastrar($cpf, $nome, $telefone, $email, $senha, $tipoUsuario): bool
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipoUsuario = $tipoUsuario;

        try {
            $sqlSelectPessoa = $this->connection->query("INSERT INTO `$this->tablePessoa`(`cpf`, `nome`, `telefone`, `email`) VALUES ('$this->cpf','$this->nome','$this->telefone','$this->email')");
            $idPessoa = $this->connection->lastInsertId();
            $sqlSelectProfissional = $this->connection->query("INSERT INTO `$this->tableProfissional`(`pessoa`, `senha`, `tipo-usuario`) VALUES ('$idPessoa','$this->senha','$this->tipoUsuario')");
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

//Testes
//echo "cad";
//$usu = new UsuarioModel();
//$usu->cadastrar("0412sa", "wall", "87", "wl", "123", "admin");
