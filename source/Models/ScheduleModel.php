<?php

namespace Source\Models;

class ScheduleModel extends ConnectDB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listSchedule($nome = ""): bool|array
    {
        if ($nome == "") {
            $sqlSelect = $this->connection->query("
                SELECT a.id, a.horario, p.nome, ppr.nome, a.valor, a.status
                FROM agenda as a
                INNER JOIN cliente AS c ON a.cliente = c.id
                INNER JOIN profissional AS pr ON a.profissional = pr.id
                INNER JOIN pessoa AS p ON c.pessoa = p.id
                INNER JOIN pessoa AS ppr ON pr.pessoa = ppr.id
            ");
        } else {
            $sqlSelect = $this->connection->query("SELECT pess.id, pess.cpf, pess.nome, pess.telefone FROM pessoa as pess INNER JOIN cliente c on pess.id = c.pessoa WHERE pess.nome = '$nome'");
        }
        return $sqlSelect->fetchAll();
    }

    public function scheduleAdd($idClient, $idUser, $date, $hour, $price, $observation, $services): bool
    {
        try {
            $this->connection->query("INSERT INTO agenda (cliente, profissional, data, horario, valor, observacao, status)
                VALUES ($idClient, $idUser, '$date', '$hour', $price, '$observation', 0)");
            $idSchedule = $this->connection->lastInsertId();
            foreach ($services as $serviceItem) {
                $this->connection->query("INSERT INTO agenda_servico (agenda, servico) VALUES ($idSchedule, $serviceItem)");
            }
            $_SESSION["message"] = ["message" => "Agendamento realizado com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao realizar agendamento!", "type" => "danger"];
            return false;
        }
    }

    public function scheduleEdit($idSchedule, $idClient, $idUser, $date, $hour, $price, $observation, $idServices, $services): bool
    {
        try {
            $this->connection->query("
                UPDATE agenda SET cliente = '$idClient', profissional = '$idUser', data = '$date', horario = '$hour',
                valor = '$price', observacao = '$observation' WHERE id = $idSchedule
            ");
            for ($i = 0; $i < count($services); $i++) {
                if (count($idServices) > $i) {
                    $this->connection->query("UPDATE agenda_servico SET servico = $services[$i] WHERE id = $idServices[$i]");
                } else {
                    $this->connection->query("INSERT INTO agenda_servico (agenda, servico) VALUES ($idSchedule, $services[$i])");
                }
            }
            $_SESSION["message"] = ["message" => "Agendamento alterado com sucesso!", "type" => "success"];
            return true;
        } catch (\PDOException $e) {
            $_SESSION["message"] = ["message" => "Erro ao alterar dados de agendamento!", "type" => "danger"];
            return false;
        }
    }

    public function getSchedule($id)
    {
        $schedule = $this->connection->query("SELECT * FROM agenda WHERE id = $id");
        return $schedule->fetch();
    }

    public function getServicesSchedule($id): false|array
    {
        $schedules = $this->connection->query("
            SELECT agenda_servico.id as idas, servico.id FROM servico
            INNER JOIN agenda_servico ON agenda_servico.servico = servico.id
            INNER JOIN agenda
            WHERE agenda = $id");
        return $schedules->fetchAll();
    }
}