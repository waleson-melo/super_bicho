<?php

namespace Source\Controllers;

use Source\Models\ClientModel;

class Client
{
    public function __construct()
    {
        if (!$_SESSION["authenticated"]) {
            header("Location: " . URL_BASE . "/login");
        }
    }

    public function clients(array $data): void
    {
        $namePage = "Clientes";

        if (!isset($_GET["nome"])) {
            $clienteList = (new ClientModel)->listClients();
        } else {
            $clienteList = (new ClientModel)->listClients($_GET["nome"]);
        }

        require __DIR__ . "/../../theme/views/indexClients.php";
    }

    public function clientsAdd(array $data): void
    {
        $namePage = "Clientes";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            require __DIR__ . "/../../theme/views/formClients.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((new ClientModel)->addClient($data["cpf"], $data["nome"], $data["telefone"], $data["email"], $data["endereco"])) {
                header("Location: " . URL_BASE . "/clientes");
            } else {
                header("Location: " . URL_BASE . "/clientes/novo");
            }
        }
    }

    public function clientsEdit(array $data): void
    {
        $namePage = "Editar Cliente";
        $url = URL_BASE;

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $client = (new ClientModel)->getClient($data["id"]);
            require __DIR__ . "/../../theme/views/formClients.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((new ClientModel)->editClient($data["id"], $data["cpf"], $data["nome"],
                $data["telefone"], $data["email"], $data["endereco"])) {

                header("Location: $url/clientes");
            } else {
                header("Location: $url/clientes/editar/{$data["id"]}");
            }
        }
    }

    public function clientsDelete(array $data): void
    {
        if ((new ClientModel)->deleteClient($data["id"])) {
            header("Location: " . URL_BASE . "/clientes");
        } else {
            header("Location: " . URL_BASE . "/clientes");
        }
    }
}