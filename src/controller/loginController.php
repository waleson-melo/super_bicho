<?php

require_once('./src/model/loginModel.php');

class LoginController
{
    private LoginModel $model;

    function __construct()
    {
        $this->model = new LoginModel();
    }

    function login($userLogin, $password): void
    {
        $resultData = $this->model->login($userLogin, $password);

        if ($resultData) {
            session_destroy();
            header('Location: ./src/view/dashboard.php');
        } else {
            $_SESSION['msg'] = 'Erro ao entrar. Login ou Senha incorreto(s)!';
            header('Location: ./index.php');
        }
        exit;
    }
}
