<?php

namespace Source\Controllers;

use Source\Models\UserModel;

class User
{
    public function __construct()
    {
        if (!$_SESSION["authenticated"]) {
            header("Location: " . URL_BASE . "/login");
        }
    }

    public function users(array $data): void
    {
        $namePage = "Usuários";

        if (!isset($_GET["nome"])) {
            $userList = (new UserModel)->listUsers();
        } else {
            $userList = (new UserModel)->listUsers($_GET["nome"]);
        }

        require __DIR__ . "/../../theme/views/index_user.php";
    }

    public function usersAdd(array $data): void
    {
        $namePage = "Usuários";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            require __DIR__ . "/../../theme/views/formUsers.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((new UserModel)->addUser(
                $data["cpf"], $data["nome"], $data["telefone"], $data["email"], $data["endereco"], $data["senha"],
                $data["tipousuario"])) {

                header("Location: " . URL_BASE . "/usuarios");
            } else {
                header("Location: " . URL_BASE . "/usuarios/novo");
            }
        }
    }

    public function usersEdit(array $data): void
    {
        $namePage = "Editar Usuários";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $user = (new UserModel)->getUser($data["id"]);
            require __DIR__ . "/../../theme/views/formUsers.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ((new UserModel)->editUser($data["id"], $data["pessoa"], $data["cpf"], $data["nome"], $data["telefone"],
                $data["email"], $data["endereco"], $data["senha"], $data["tipousuario"])) {

                header("Location: " . URL_BASE . "/usuarios");
            } else {
                header("Location: " . URL_BASE . "/usuarios/editar/{$data["id"]}");
            }
        }
    }

    public function usersDelete(array $data): void
    {
        if ((new UserModel)->deleteUser($data["id"])) {
            header("Location: ". URL_BASE . "/usuarios");
        } else {
            header("Location: ". URL_BASE . "/usuarios");
        }
    }
}