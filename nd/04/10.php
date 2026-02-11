<?php

/*
Sugeneruokite 10 skaičių masyvą pagal taisyklę: Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25.
Trečias, pirmo ir antro suma. Ketvirtas- antro ir trečio suma.
Penktas trečio ir ketvirto suma ir t.t.

*/

$masyvas = [];

$masyvas[] = rand(5, 25); // automaštikai 0
$masyvas[] = rand(5, 25); // automaštikai 1

for ($i = 2; $i < 10; $i++) {
    $masyvas[$i] = $masyvas[$i - 1] + $masyvas[$i - 2];
    /*
    i nuo 2 iki 9
    Kai i = 2
    $masyvas[2] = $masyvas[2 - 1] + $masyvas[2 - 2]
    $masyvas[2] = $masyvas[1] + $masyvas[0]
    [a, b, c]
    
    Kai i = 3
    $masyvas[3] = $masyvas[3 - 1] + $masyvas[3 - 2]
    $masyvas[3] = $masyvas[2] + $masyvas[1]
    */
}

echo '<pre>';
print_r($masyvas);