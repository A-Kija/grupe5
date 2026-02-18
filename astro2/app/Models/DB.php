<?php

namespace Astro\Note\Models;

use PDO;
use Astro\Note\Models\Data;

class DB implements Data {

    private $pdo;
    private $table;

    public function __construct($dbName, $table)
    {
        $host = '127.0.0.1';
        $db   = $dbName;
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $options);
        $this->table = $table;
    }

    public function read() : array
    {
        $sql = "
            SELECT *
            FROM {$this->table}
        ";
        $stmt = $this->pdo->prepare($sql); // vykdom paruošimą
        $stmt->execute([]); // vykdom užklausą
        $data = $stmt->fetchAll();
        return $data;
    }



}