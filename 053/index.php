<?php

$masyvasA = [];

for ($i = 0; $i < 30; $i++) {
    $masyvasA[] = rand(5, 25); // php array push analogas
}

echo '<pre>';

print_r($masyvasA);

$maxValue = $masyvasA[0]; // pridedam palyginimui 1 reikšmę
$maxIndexes = [];

/*
    Kas tai galėtų būti
    Reikia parodyti komentarus, turinčius daugiausiai "laikų"
*/

foreach ($masyvasA as $index => $value) {

    if ($value > $maxValue) {
        $maxValue = $value; // nauja didžiausia reikšmė
        $maxIndexes = [];
    }

    if ($value == $maxValue) {
        $maxIndexes[] = $index;
    }

    // jeigu mažesnė tai nieko nedarom

}

echo '<br>';

echo 'Max: ' . $maxValue . '<br>';
print_r($maxIndexes);


$indexValuesSum = 0;


foreach ($masyvasA as $index => $value) {

    if ($index % 2 === 0) { // visos falsey reikšmės yra "pavojingos" ir geriau jas lyginti === (religija)
        $indexValuesSum += $value;
    }

    // jeigu ne, tai nieko

}

echo '<br>';

echo 'SUM: ' . $indexValuesSum . '<br>';
