<?php

$didelisMasyvas = [];

for ($i = 0; $i < 5; $i++) {

    $didelisMasyvas[$i] = [];

    $mazoMasyvoIlgis = rand(0, 10); // kiek mazam masyve bus elementų

    for ($j = 0; $j < $mazoMasyvoIlgis - 1; $j++) {

        $didelisMasyvas[$i][$j] = rand(10, 99);

    }

}

echo '<pre>';

print_r($didelisMasyvas);

$dideleSuma = 0;

foreach ($didelisMasyvas as $valueDidelis) {

    foreach ($valueDidelis as $valueMazas) {
        $dideleSuma += $valueMazas;
    }

}

echo '<br>';
echo 'SUMA: ' . $dideleSuma;


usort($didelisMasyvas, 'rusiuoklis');


function rusiuoklis($a, $b) {

    return count($a) <=> count($b);

}

echo '<br>';

print_r($didelisMasyvas);
