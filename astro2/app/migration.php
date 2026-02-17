<?php
namespace Astro\Note;

use PDO;

require __DIR__ .'/../vendor/autoload.php';

$host = '127.0.0.1';
$db   = 'astro2';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fečinam kaip masyvą
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

/*
	TABLE notes

    1	id Primary	int(11)	
	2	title	varchar(100)
	3	date	date
	4	content	text	

*/

// Drop existing table if it exists
$pdo->exec("DROP TABLE IF EXISTS notes");

// Create new notes table
$pdo->exec("
    CREATE TABLE notes (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(100) NOT NULL,
        date DATE NOT NULL,
        content TEXT NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
");

echo "Table 'notes' created successfully.";

