<?php

// CIKLAI

echo 'FOR<br><br>';

for ($i = 0; $i < 5; $i++) {
    echo $i . '<br>';
}

echo '<br>WHILE<hr><br>';

$i = 0;
while ($i < 5) {
    echo $i . '<br>';
    $i++;
}

echo '<br>DO WHILE<hr><br>';

$i = 0;
do {
    echo $i . '<br>';
    $i++;
} while ($i < 5);


echo '<br>FOR in FOR<hr><br>';
for ($i = 0; $i < 5; $i++) {
    echo 'I:' . $i . '<br>';
    
    for ($j = 0; $j < 5; $j++) {

        if ($j == 2) {
            // continue; // nutraukia mažo ciklo iteraciją
            continue 2; // nutraukia mažą ciklą ir didžiojo ciklo iteraciją
        }

        echo '----J:' . $j . '<br>';
        // break; mažo nutraukimas
        // break 2; mažo ir tėvinio nutraukimas
 
    }

    // break; didelio nutraukimas

}

// JOKE Tikri PHP programeriai nenaudoja FOR ciklo :)

// MASYVAI

$masyvas1 = []; // tuščias masyvas
$masyvas2 = array(); // senovinis būdas, nerašykit taip nes juoksis iš jūsų

echo '<pre>';
echo '<br>ARRAY<hr><br>';

print_r($masyvas1);

$masyvas3 = [4, 8, 'Bebras', 5 => 'Barsukas', 0];

// 5 yra indeksas => tada reikšmė

// sekantis elementas yra didžiausias indeksas +1

// 3 nedingo
$masyvas3[3] = 55;

print_r($masyvas3);

$masyvas4 = [4, 8 => 'Bebras', 'Barsukas', 'labas' => 55, 'Briedis'];

$masyvas4['labas'] = 107;

$masyvas4['14'] = 107; // jeigu indeksą gali paversti skaičium, tai taip ir bus
$masyvas4[14] = 107;

$masyvas4[] = 222; // push į masyvą, indeksas max indeksas + 1;

print_r($masyvas4);