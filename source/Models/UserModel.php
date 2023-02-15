<?php

namespace Source\Models;

class UserModel extends ConnectDB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(string $email, string $password): bool
    {
        if (!empty($email) and !empty($password)) {
            $user = $this->connection->query("SELECT pr.id, p.nome, pr.`tipo-usuario` FROM pessoa AS p INNER JOIN profissional AS pr ON p.id = pr.pessoa WHERE p.email = '$email' AND pr.senha = '$password'");

            if ($user->rowCount() != 0) {
                $user = $user->fetch();
                $_SESSION["authenticated"] = true;
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["nome"];
                $_SESSION["user_type"] = $user["tipo-usuario"];
                return true;
            }
        }
        $_SESSION["message"] = ["message" => "Dados incorretos!", "type" => "danger"];
        return false;
    }

    public function listUsers($nome = ""): bool|array
    {
        if ($nome == "") {
            $sqlSelect = $this->connection->query("SELECT prof.id, prof.`tipo-usuario`, pess.nome FROM profissional AS prof INNER JOIN pessoa AS pess ON pess.id = prof.pessoa");
        } else {
            $sqlSelect = $this->connection->query("SELECT prof.id, prof.`tipo-usuario`, pess.nome FROM profissional AS prof INNER JOIN pessoa AS pess ON pess.id = prof.pessoa WHERE pess.nome = '$nome'");
        }
        return $sqlSelect->fetchAll();
    }

    public function addUser($cpf, $nome, $telefone, $email, $endereco, $senha, $tipoUsuario): bool
    {
        try {
            $this->connection->query("INSERT INTO pessoa (cpf, nome, telefone, email, endereco) VALUES ('$cpf', '$nome', '$telefone', '$email', '$endereco')");
            $idPessoa = $this->connection->lastInsertId();
            $this->connection->query("INSERT INTO profissional(pessoa, senha, `tipo-usuario`) VALUES ('$idPessoa','$senha','$tipoUsuario')");
            $_SESSION["message"] = ["message" => "Usuário cadastrados com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao cadastrar usuario!", "type" => "danger"];
            return false;
        }
    }

    public function getUser($id): bool|array
    {
        $sqlSelect = "
            SELECT prof.id, prof.`tipo-usuario`, prof.pessoa, pess.cpf, pess.nome, pess.telefone, pess.email, pess.endereco 
            FROM profissional AS prof
            INNER JOIN pessoa AS pess ON prof.pessoa = pess.id
            WHERE prof.id = $id
        ";
        $resultData = $this->connection->query($sqlSelect);
        return $resultData->fetch();
    }

    public function editUser($id, $pessoa, $cpf, $nome, $telefone, $email, $endereco, $senha, $tipoUsuario): bool
    {
        try {
            $this->connection->query("UPDATE pessoa SET cpf='$cpf', nome='$nome', telefone='$telefone', email='$email', endereco='$endereco' WHERE id = $pessoa");
            $this->connection->query("UPDATE profissional SET senha='$senha', `tipo-usuario`='$tipoUsuario' WHERE id = '$id'");
            $_SESSION["message"] = ["message" => "Usuário alterado com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao alterar dados do usuario!", "type" => "danger"];
            return false;
        }
    }

    public function deleteUser($id): bool
    {
        try {
            $resultData = $this->connection->query("SELECT pessoa FROM profissional WHERE id = $id")->fetch()["pessoa"];
            $this->connection->query("DELETE FROM pessoa WHERE id = $resultData");
            $this->connection->query("DELETE FROM profissional WHERE id = $id");
            $_SESSION["message"] = ["message" => "Usuário apagado com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao apagar usuário!", "type" => "success"];
            return false;
        }
    }
}