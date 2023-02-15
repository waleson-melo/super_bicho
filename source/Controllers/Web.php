<?php

namespace Source\Controllers;

class Web
{
    public function error(array $data): void
    {
        echo "<h1>Erro {$data["errcode"]}</h1>";
    }
}