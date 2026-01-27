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

$zmogus = [
    'vardas' => 'Jeronimas',
    'auto' => 'Kadilakas',
    'amzius' => 55
];

print_r($zmogus);

// reikia sukurti masyvą, kuriame būtų 10 reikšmių 0, 2, 4, 6... 18.


$mas024 = [];

// for ($i = 0; $i < 10; $i++) {
//     $mas024[$i * 2] = $i * 2;
// }

for ($i = 0; $i < 20; $i+=2) {
    $mas024[] = $i;
}

print_r($mas024);


echo '<br>FOREACH<hr><br>';

foreach($zmogus as $reiksme) {

    echo $reiksme . '<br>';
}

echo '<br>FOREACH<hr><br>';

foreach($zmogus as $indeksas => $reiksme) {

    echo $indeksas . ': ' . $reiksme . '<br>';
}

$masyvas123 = range('a', 'z'); // padaro masyvą

print_r($masyvas123);

foreach(range(1, 5) as $i) {
    echo $i . '<br>';
}

// pagal reikšme ir pagal nuorodą

echo '<br>--------------<hr><br>';

$m1 = [1, 2, 3];
$m2 = $m1; // perdavimas pagal reikšmę

$m1[] = 4;

print_r($m1);
print_r($m2);

echo '<br>--------------<hr><br>';

$m3 = [1, 2, 3];
$m4 =& $m3; // perdavimas pagal nuorodą

$m3[] = 4;

print_r($m3);
print_r($m4);


$colors = ['Red', 'Green', 'Blue', 'Yellow'];

foreach($colors as &$color){} // $color pagal nuorodą (by reference)

// reikėtų nepamiršt panaudotą nebereikalingą nuorodą "užmušt"

unset($color); // unset panaikina nuorodą

foreach($colors as $color){ // $color pagal reikšmę (by value)
    echo $color . '<br>';
}

$fun = function($el) {
    return $el . '***';
};

$naujasZmogus = array_map($fun, $zmogus);


echo '<br>--------------<hr><br>';

print_r($naujasZmogus);

