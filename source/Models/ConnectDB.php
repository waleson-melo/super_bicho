<?php

namespace Source\Models;

use PDO;
use PDOException;

class ConnectDB
{
    protected PDO $connection;

    public function __construct()
    {
        $this->connectDatabase();
    }

    function connectDatabase()
    {
        try {
            $this->connection = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
        } catch (PDOException $e) {
            echo 'Error!' . $e->getMessage();
            die();
        }
    }
}