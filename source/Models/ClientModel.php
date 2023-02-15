<?php

namespace Source\Models;

class ClientModel extends ConnectDB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listClients($nome = ""): bool|array
    {
        if ($nome == "") {
            $sqlSelect = $this->connection->query("SELECT pess.id, c.id as cid, pess.cpf, pess.nome, pess.telefone FROM pessoa as pess INNER JOIN cliente c on pess.id = c.pessoa");
        } else {
            $sqlSelect = $this->connection->query("SELECT pess.id, pess.cpf, pess.nome, pess.telefone FROM pessoa as pess INNER JOIN cliente c on pess.id = c.pessoa WHERE pess.nome = '$nome'");
        }
        return $sqlSelect->fetchAll();
    }

    public function addClient($cpf, $nome, $telefone, $email, $endereco): bool
    {
        try {
            $this->connection->query("INSERT INTO pessoa (cpf, nome, telefone, email, endereco) VALUES ('$cpf', '$nome', '$telefone', '$email', '$endereco')");
            $idPessoa = $this->connection->lastInsertId();
            $this->connection->query("INSERT INTO cliente (pessoa) VALUES ('$idPessoa')");
            $_SESSION["message"] = ["message" => "Cliente cadastrados com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao cadastrar cliente!", "type" => "danger"];
            return false;
        }
    }

    public function getClient($id): bool|array
    {
        $sqlSelect = "
            SELECT pess.id as idp, c.id as idc, pess.cpf, pess.nome, pess.email, pess.endereco, pess.telefone
            FROM pessoa as pess INNER JOIN cliente c on pess.id = c.pessoa WHERE c.id = '$id'
        ";
        $resultData = $this->connection->query($sqlSelect);
        return $resultData->fetch();
    }

    public function getClientName($name): bool|array
    {
        $sqlSelect = "
            SELECT pess.id, c.id as idc, pess.cpf, pess.nome, pess.email, pess.endereco, pess.telefone FROM pessoa as pess INNER JOIN cliente c on pess.id = c.pessoa WHERE pess.nome = '$name'
        ";
        $resultData = $this->connection->query($sqlSelect);
        return $resultData->fetch();
    }

    public function editClient($id, $cpf, $nome, $telefone, $email, $endereco): bool
    {
        try {
            $pessoa = $this->connection->query("SELECT pessoa FROM cliente WHERE id = $id")->fetch()["pessoa"];
            $this->connection->query("UPDATE pessoa SET cpf='$cpf', nome='$nome', telefone='$telefone', email='$email', endereco='$endereco' WHERE id = $pessoa");
            $_SESSION["message"] = ["message" => "Cliente alterado com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao alterar dados do cliente!", "type" => "danger"];
            return false;
        }
    }

    public function deleteClient($id): bool
    {
        try {
            $pessoa = $this->connection->query("SELECT pessoa FROM cliente WHERE id = $id")->fetch()["pessoa"];
            $this->connection->query("DELETE FROM cliente WHERE pessoa = $pessoa");
            $this->connection->query("DELETE FROM pessoa WHERE id = $id");
            $_SESSION["message"] = ["message" => "Cliente apagado com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao apagar cliente!", "type" => "danger"];
            return false;
        }
    }

}