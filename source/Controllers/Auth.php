<?php

namespace Source\Controllers;

use Source\Models\UserModel;

class Auth
{
    public function login(array $data): void
    {
        $namePage = "Agendamento";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            require __DIR__ . "/../../theme/views/login.php";
        } else {
            if ((new UserModel)->login($data["email"], $data["password"])) {
                header("Location: " . URL_BASE);
            } else {
                header("Location: " . URL_BASE . "/login");
            }
        }
    }

    public function logout(): void
    {
        $_SESSION["authenticated"] = false;
        header("Location: " . URL_BASE . "/login");
    }
}