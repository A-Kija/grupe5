<?php

require __DIR__ . '/PrintIt2.php';
require __DIR__ . '/PrintIt.php';
require __DIR__ . '/Library.php';
require __DIR__ . '/MaironioLibrary.php';


$maironio = new MaironioLibrary();


$maironio->addBook('4 tankistai ir šuo Reksas', 'Zbignevas', '6564987165498');

$maironio->printArray($maironio->findBook('6564987165498'));

echo '<pre>';

$maironio->kas(); // PrintIt2
$maironio->kasKas(); // PrintIt

print_r($maironio);