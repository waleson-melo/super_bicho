<?php

namespace Source\Controllers;

use Source\Models\ClientModel;
use Source\Models\ScheduleModel;
use Source\Models\ServiceModel;
use Source\Models\UserModel;

class Schedule
{
    public function __construct()
    {
        if (!$_SESSION["authenticated"]) {
            header("Location: " . URL_BASE . "/login");
        }
    }

    public function schedules(array $data): void
    {
        $namePage = "Dashboard";

        if (!isset($_GET["nome"])) {
            $listSchedules = (new ScheduleModel)->listSchedule();
        } else {
            $listSchedules = (new ScheduleModel)->listSchedule($_GET["nome"]);
        }
        require __DIR__ . "/../../theme/views/indexSchedules.php";
    }

    public function schedulesAdd(array $data): void
    {
        $namePage = "Dashboard";
        $clients = (new ClientModel)->listClients();
        $users = (new UserModel)->listUsers();
        $services = (new ServiceModel)->listServices();

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            require __DIR__ . "/../../theme/views/formSchedules.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((new ScheduleModel)->scheduleAdd($data["client"], $data["user"], $data["date"], $data["hour"],
                $data["price"], $data["observation"], $data["services"])) {

                header("Location: " . URL_BASE . "/");
            } else {
                header("Location: " . URL_BASE . "/agendamento/novo");
                echo "nao cadastrou";
            }
        }
    }

    public function schedulesEdit(array $data): void
    {
        $namePage = "Dashboard";
        $clients = (new ClientModel)->listClients();
        $users = (new UserModel)->listUsers();
        $services = (new ServiceModel)->listServices();
        $schedule = (new ScheduleModel)->getSchedule($data["id"]);
        $servicesSelecteds = (new ScheduleModel)->getServicesSchedule($data["id"]);

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            require __DIR__ . "/../../theme/views/formSchedules.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((new ScheduleModel)->scheduleEdit($data["id"], $data["client"], $data["user"], $data["date"], $data["hour"],
                $data["price"], $data["observation"], $data["idservices"], $data["services"])) {

                header("Location: " . URL_BASE . "/");
            } else {
                header("Location: " . URL_BASE . "/agendamento/editar" . $data["id"]);
            }
        }
    }

    public function schedulesView(array $data): void
    {
        $namePage = "Dashboard";
        $clients = (new ClientModel)->listClients();
        $users = (new UserModel)->listUsers();
        $services = (new ServiceModel)->listServices();
        $schedule = (new ScheduleModel)->getSchedule($data["id"]);
        $servicesSelecteds = (new ScheduleModel)->getServicesSchedule($data["id"]);

        require __DIR__ . "/../../theme/views/viewSchedules.php";
    }
}