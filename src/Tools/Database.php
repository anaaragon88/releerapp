<?php

namespace App\Tools;

use PDO;
use PDOException;

class Database
{

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = $this->setConnection();
        } catch (PDOException $error) {
            echo "conexión fallida con la Base de Datos: " . $error->getMessage();
        }
    }

    private function setConnection()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "releerapp";
        $charset = "utf-8";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset$charset", $user, $pass, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
