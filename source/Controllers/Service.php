<?php

namespace Source\Controllers;

use Source\Models\ServiceModel;

class Service
{
    public function __construct()
    {
        if (!$_SESSION["authenticated"]) {
            header("Location: " . URL_BASE . "/login");
        }
    }

    public function services(array $data): void
    {
        $namePage = "Serviços";

        if (!isset($_GET["nome"])) {
            $serivicesList = (new ServiceModel)->listServices();
        } else {
            $serivicesList = (new ServiceModel)->listServices($_GET["nome"]);
        }

        require __DIR__ . "/../../theme/views/indexService.php";
    }

    public function servicesAdd(array $data): void
    {
        $namePage = "Serviços";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            require __DIR__ . "/../../theme/views/formServices.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((new ServiceModel)->serviceAdd($data["nome"], $data["descricao"], $data["valor"])) {
                header("Location: " . URL_BASE . "/servicos");
            } else {
                header("Location: " . URL_BASE . "/servicos/novo");
            }
        }
    }

    public function servicesEdit(array $data): void
    {
        $namePage = "Editar Serviço";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $servico = (new ServiceModel)->serviceGet($data["id"]);
            require __DIR__ . "/../../theme/views/formServices.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((new ServiceModel)->serviceEdit($data["id"], $data["nome"], $data["descricao"], $data["valor"])) {
                header("Location: " . URL_BASE . "/servicos");
            } else {
                header("Location: " . URL_BASE . "/servicos/editar/{$data["id"]}");
            }
        }
    }

    public function servicesDelete(array $data): void
    {
        if ((new ServiceModel)->serviceDelete($data["id"])) {
            header("Location: " . URL_BASE . "/servicos");
        } else {
            header("Location: " . URL_BASE . "/servico");
        }
    }
}