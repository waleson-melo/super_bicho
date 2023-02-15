<?php

namespace Source\Models;

class ServiceModel extends ConnectDB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listServices($nome = ""): bool|array
    {
        if ($nome == "") {
            $sqlSelect = $this->connection->query("SELECT * FROM servico");
        } else {
            $sqlSelect = $this->connection->query("SELECT * FROM servico WHERE nome = '$nome'");
        }
        return $sqlSelect->fetchAll();
    }

    public function serviceAdd($nome, $descricao, $valor): bool
    {
        try {
            $this->connection->query("INSERT INTO servico (nome, descricao, valor) VALUES ('$nome', '$descricao', $valor)");
            $_SESSION["message"] = ["message" => "Serviço cadastrados com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao cadastrar serviço!", "type" => "danger"];
            return false;
        }
    }

    public function serviceGet($id): bool|array
    {
        $sqlSelect = "
            SELECT * FROM servico WHERE id = '$id'
        ";
        $resultData = $this->connection->query($sqlSelect);
        return $resultData->fetch();
    }

    public function serviceEdit($id, $nome, $descricao, $valor): bool
    {
        try {
            $this->connection->query("UPDATE servico SET nome='$nome', descricao='$descricao', valor=$valor WHERE id = $id");
            $_SESSION["message"] = ["message" => "Serviço alterado com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao alterar dados do serviço!", "type" => "danger"];
            return false;
        }
    }

    public function serviceDelete($id): bool
    {
        try {
            $this->connection->query("DELETE FROM servico WHERE id = '$id'");
            $_SESSION["message"] = ["message" => "Serviço apagado com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao apagar servico!", "type" => "danger"];
            return false;
        }
    }
}