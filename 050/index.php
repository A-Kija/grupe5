<?php

// privatus komentaras

/* 
  Dokumentinis
  keliu eiluciu
  komentaras
*/

# specialios paskirties komentaras atributams

$stringas = 'LABAS, BEBRAI';

$skaicius = 2024;

$skaicius = $skaicius + 10;
$skaicius += 10; // tas pats kaip ir virsuje

$kitasStringas = ' Ką tu veiki?';

$galutinisStringas = $stringas . $kitasStringas; // sujungia du stringus

echo $galutinisStringas;

$stringasSuMetais1 = 'Metai: ' . $skaicius; // kabutės viengubos.
$stringasSuMetais2 = "Metai: $skaicius"; // kabutės dvigubos. 
$stringasSuMetais3 = 'Metai: $skaicius';// viengubose kabutėse kintamieji neįvertinami.
$stringasSuMetais1 = "Metai: " . $skaicius; // dvigubose kabutėse galima ir taip. BET gausit per nagus nuo mokytojo.

echo '<br>';
echo $stringasSuMetais1;
echo '<br>';
echo $stringasSuMetais2;
echo '<br>';
echo $stringasSuMetais3;

$laikinas = 'Laikinas tekstas';
echo '<br>';
echo $laikinas;
unset($laikinas); // istrina kintamaji
echo $laikinas; // klaida, nes kintamasis istrintas
echo '<br>';
echo 'Viršuje buvo bandoma atspausdinti ištrintą kintamąjį. Tai yra ne kritinis klaidos pavyzdys.';
// 'Indiškas būdas' paslėpti klaidą
echo '<br>';
echo @$laikinas; // klaidos neprispausdins, bet kintamasis vistiek neegzistuoja

// kintamųjų tipai: string, integer, float, boolean, array, object, null

// string
$kintamasis1 = 'Tai yra stringas';

// integer
$kintamasis2 = 2024;
$kintamasis2minusas = -2024;
$kintamasis2binarinis = 0b11111100100; // binary = 2024
$kintamasis2oktalinis = 02410; // octal = 2024
$kintamasis2heksadecimalinis = 0x7E4; // hexadecimal = 2024

// float
$kintamasis3 = 3.14;

// boolean
$kintamasis4 = true; // false
$kintamasis4false = false;

// array
$kintamasis5 = ['vienas', 'du', 'trys', 5, true, 'žąsis', null]; // indeksuotas masyvas
$kintamasis5taspat = ['vienas', 'du', 'trys'];
echo '<br>';
echo $kintamasis5 == $kintamasis5taspat ? 'Masyvai lygūs' : 'Masyvai nelygūs'; // tikrina ar masyvai lygūs
// masyvas yra lygus nes PHP tai ne objektai

echo '<br><pre>'; // <pre> - preformatuotas tekstas
print_r($kintamasis5); // atspausdina masyvo turini
echo '</pre><br>';

// kitas būdas atspausdinti masyvo turini
echo '<br><pre>';
var_dump($kintamasis5); // atspausdina masyvo turini su tipais
echo '</pre><br>';


// object
$kintamasis6 = new stdClass(); // JS analogas {}
$kintamasis6kitas = (object)[]; // kitas budas sukurti tuscia objekta

// null
$kintamasis7 = null;

// $ kintamasis
// $$ kintamasis - kintamojo kintamasis
// $$$ kintamasis - kintamojo kintamojo kintamasis

$vardas = 'Jonas';
$$vardas = 'Petras'; // sukuriamas kintamasis $Jonas

// $+$vardas ==> $+Jonas

echo '<br>';
echo $vardas; // isveda 'Jonas'
echo '<br>';
echo $Jonas; // isveda 'Petras'


// KINTAMUJU KONSTANTOS
// aprašomos naudojant define() funkciją arba const raktažodį
define('KONSTANTA1', 'Bla bla');
const KONSTANTA2 = 'Bla bla bla';
echo '<br>';
echo KONSTANTA1;
echo '<br>';
echo KONSTANTA2;
// KONSTANTOS negali būti keičiamos po aprašymo
// KONSTANTOS rašomos didžiosiomis raidėmis su _ tarp žodžių

// tikrinam ar konstanta yra aprašyta    defined('KONSTANTA1')
if (defined('KONSTANTA1')) {
    echo '<br>';
    echo 'KONSTANTA1 yra aprašyta';
} else {
    echo '<br>';
    echo 'KONSTANTA1 nėra aprašyta';
}

// php nustatinės konstantos
echo '<br>';
echo PHP_VERSION; // php versija
echo '<br>';
echo PHP_INT_MAX; // didžiausias integer skaičius
echo '<br>';
echo PHP_FLOAT_MAX; // didžiausias float skaičius
echo '<br>';
echo PHP_OS; // operacinė sistema


echo '<br>';// KINTAMUJU TIPU KEITIMAS
$kintamasisTipas = '1234'; // string
echo gettype($kintamasisTipas); // isveda kintamojo tipa
echo '<br>';

var_dump('1' == '01'); // true, nes lygina reiksmes
// kaip lygina '1' == '01'
// 1. abu stringai paverčiami į integer tipus '1' -> 1 , '01' -> 1 '01' yra aštuntojo skaičiavimo sistemos skaičius, bet paverčiamas į dešimtainę
// 2. lyginamos reiksmes 1 == 1
echo '<br>';
var_dump('1' === '01'); // false, nes lygina ir tipus
// kaip lygina '1' === '01'
// 1. abu stringai lieka stringais

// php galima nustatyti strict_types, kad būtų griežtai lyginami tipai
// tai daroma failo viršuje, prieš <?php žymę
// declare(strict_types=1);

/*
Jonas ir Petras žaidžiai šaškėm. Petras surenka taškų kiekį nuo 10 iki 20, Jonas surenka taškų kiekį nuo 5 iki 25. Išvesti žaidėjų vardus su taškų kiekiu ir
 “Laimėjo: laimėtojo vardas”;
Taškų kiekį generuokite funkcija rand();
*/

$petrasTaskai = rand(10, 20);
$jonasTaskai = rand(5, 25);
echo '<br><hr><br>';
echo "Petras surinko: {$petrasTaskai} taškų. <br>";
echo "Jonas surinko: $jonasTaskai taškų. <br>";
if ($petrasTaskai > $jonasTaskai) {
    echo 'Laimėjo: Petras';
} elseif ($jonasTaskai > $petrasTaskai) {
    echo 'Laimėjo: Jonas';
} else {
    echo 'Lygiosios!';
}

echo '<br><hr><br>';

//Priskiriamoji sąlyga
$vienas = 1;
$rezultatas = 1 == $vienas ? 'Yes' : 'No'; // $rezultatas  yra 'Yes'
echo $rezultatas;
echo '<br>';
$rezultatas = 3 == $vienas ? 'Yes' : 'No'; // $rezultatas  yra 'No'
echo $rezultatas;
echo '<br><hr><br>';



//Priskiriamoji sąlyga su priskiramająja salyga viduje
$kintamasis = 5;
$rezultatas = $kintamasis < 3 ? 'Mažiau nei 3' : ($kintamasis > 7 ? 'Daugiau nei 7' : 'Nuo 3 iki 7'); // $rezultatas yra 'Nuo 3 iki 7'
// skliausteliai viduje yra būtini
echo $rezultatas;
echo '<br><hr><br>';

//Priskiriamoji sąlyga su null coalescing operatoriumi
// $kintamasis222 = null;
$rezultatas = $kintamasis222 ?? 'Kintamasis yra null arba nenurodytas'; // $rezultatas yra 'Kintamasis yra null'
echo $rezultatas;
echo '<br><hr><br>';

// priskyrimas su match operatoriumi (PHP 8.0+)

$kintamasisMatch = 22;
$rezultatasMatch = match ($kintamasisMatch) {
    1 => 'Viena',
    2 => 'Du',
    3 => 'Trys',
    default => 'Kitas skaičius',
};
echo $rezultatasMatch;
echo '<br><hr><br>';
