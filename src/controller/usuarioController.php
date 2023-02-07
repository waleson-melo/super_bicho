<?php

require_once('../model/usuarioModel.php');

class UsuarioController
{
    private $model;

    function __construct()
    {
        $this->model = new UsuarioModel();
    }

    function cadastrar($cpf, $nome, $telefone, $email, $senha, $tipoUsuario)
    {
        $resultData = $this->model->cadastrar($cpf, $nome, $telefone, $email, $senha, $tipoUsuario);

        if ($resultData) {
            session_destroy();
            header('Location: ./dashboard.php');
        } else {
            $_SESSION['msg'] = 'Erro ao cadastrar usuário!';
            header('Location: ./usuarios.php');
        }
        exit;
    }
}
