<?php

namespace Astro\Note\Models;

use PDO;
use Astro\Note\Models\Data;
use Astro\Note\App;

class DB implements Data {

    private $pdo;
    private $table;

    public function __construct($table)
    {
        $host = '127.0.0.1';
        $db   = App::DB_NAME;
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


    public function show(int $id) : object
    {
        $sql = "
            SELECT *
            FROM {$this->table}
            WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql); // vykdom paruošimą
        $stmt->execute([$id]); // vykdom užklausą
        $data = $stmt->fetch();
        return $data;
    }

    public function store(object $data) : bool
    {
        $sql = "
            INSERT INTO {$this->table} (date, title, content)
            VALUES (?, ?, ?)
        ";
        $stmt = $this->pdo->prepare($sql); // vykdom paruošimą
        $stmt->execute([$data->date, $data->title, $data->content]); // vykdom užklausą

        return true;
    }

    public function destroy(int $id) : bool
    {
        $sql = "
            DELETE FROM {$this->table}
            WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return true;
    }

    public function update(int $id, object $data) : bool
    {
        $sql = "
            UPDATE {$this->table}
            SET date = ?, title = ?, content = ?
            WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data->date, $data->title, $data->content, $id]);

        return true;
    }



}