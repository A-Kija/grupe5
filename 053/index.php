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

$str = 'Labas, Žąsisnas? Ar tau jau 12 metų? Šernai, ką tu? Kiek bus 54 + 87';
$re = '/(.{2})(\d{2}).+?/m';

$result = preg_match_all($re, $str, $matches); // $maches per nuorodą (by reference) gaunasmas rezultatas

echo '<br>';

var_dump($result); // nurodo atitikimų skaičių

print_r($matches);

$vardas = 'Kristupas Kolumbas';

// Funkcija PHP tarsi burbulas į kurį kintamieji nepatenka ir iš jo neišeina


// Deklaracija
function kaTu() {

    echo '<br>Ką tu? ' . $vardas;
    $kinatasFunkcijoje = 102;

}

// Kvietimas
kaTu();

echo '<br>' . $kinatasFunkcijoje;

echo '<br><hr>';


// SENAS!!! Blogos architektūros PVZ:


// function kaTu__BLOGA() {

//     global $vardas, $kinatasFunkcijoje; // NU tai yra BLOGAI!

//     echo '<br>Ką tu? ' . $vardas;
//     $kinatasFunkcijoje = 102;

// }

// kaTu__BLOGA();

// echo '<br>' . $kinatasFunkcijoje;


function kaTu__Normalus($vardasA, &$kinatasFunkcijojeA) {

    echo '<br>Ką tu? ' . $vardasA;
    $kinatasFunkcijojeA = 102;

}

kaTu__Normalus($vardas, $kinatasFunkcijoje);

echo '<br>' . $kinatasFunkcijoje;
