<?php

require_once('./src/utils/connect_db.php');

class LoginModel extends Connect {
    private $table;

    function __construct() {
        parent::__construct();
        $this->table = 'profissional';
    }

    function login($userLogin, $password): bool {
        $sqlSelect = $this->connection->query("SELECT p.nome, pr.`tipo-usuario` FROM pessoa AS p  INNER JOIN profissional AS pr ON p.id = pr.pessoa WHERE p.email = '$userLogin' AND pr.senha = '$password'");

        if($sqlSelect->rowCount() != 0) {
            return true;
        } else {
            return false;
        }
    }
}