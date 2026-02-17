<?php
namespace Astro\Note;

use PDO;
use Faker\Factory as Faker;

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

$notesCount = 30;

for ($i = 1; $i <= $notesCount; $i++) {
    
}