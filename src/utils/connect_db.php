<?php

const HOST = 'localhost';
const DBNAME = 'superbicho';
const USER = 'root';
const PASSWORD = '';

class Connect {
    protected PDO $connection;

    function __construct() {
        $this->connectDatabase();
    }

    function connectDatabase(): void {
        try {
            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
        } catch (PDOException $e) {
            echo 'Error!'.$e->getMessage();
            die();
        }
    }
}
