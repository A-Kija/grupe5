<?php

require __DIR__ . '/TV.php';
require __DIR__ . '/biblioteka/Knyga.php';
require __DIR__ . '/Knyga.php';


$knyga1 = new Mano\Ir\Tik\Mano\Knyga('Beko', 150);

$knyga2 = new AI\GPT5\Knyga('Copy', 'Ai', 350000);




echo '<pre>';

print_r($knyga1);
print_r($knyga2);
