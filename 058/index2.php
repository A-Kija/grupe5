<?php

require __DIR__ . '/Fauna.php';
require __DIR__ . '/Fauna2.php';
require __DIR__ . '/Flora.php';

require __DIR__ . '/Miskas.php';
require __DIR__ . '/Zveris.php';

// echo '<br>';

// echo Miskas::$kas;

// echo '<br>';

// echo Zveris::$kas;


$vienas = new Zveris('Barsukas');
$antras = new Zveris('Barsukas Nr. 2');

$antras->valio2();


echo '<pre>';

print_r($vienas);
print_r($antras);