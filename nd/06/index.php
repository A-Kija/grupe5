<?php
// declare(strict_types=1); išjungia auto tipų konvertavimus

/*
Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;
Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.
*/


function kiekBeLiekanos(int $skaicius) : int
{
    $rezultatas = 0;

    for ($i = 2; $i < $skaicius; $i++) {
        if ($skaicius % $i === 0) {
            $rezultatas++;
        }
    }

    return $rezultatas;
}

echo kiekBeLiekanos(6);



$masyvas = [];

foreach(range(1, 100) as $_) {
    $masyvas[] = rand(33, 77);
}

echo '<pre><br>';




usort($masyvas, function($a, $b) {
    return kiekBeLiekanos($b) - kiekBeLiekanos($a);
});

print_r($masyvas);