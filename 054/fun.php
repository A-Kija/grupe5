<?php

function recursive($num){
    echo 'IN: ' . $num, '<br>';
    if ($num < 3) {
        // Kviečiame save. Padidiname numerį vienetu.
        recursive($num + 1);
    }
    echo 'OUT: ' . $num, '<br>';
}
$startNum = 1;
recursive($startNum);


$kreivasMasyvas = [
    5, [
        7, 8 , [
            1 , [ [
                    5, 7
                ], 8, 7
            ], 0, [
                8, 2, [
                    3, 3, 3
                ]
            ], [
                7
            ], 8, [ 
                9, 4
            ], 7
        ], 5, 7
    ], [], 8, []
];

echo '<pre>';

print_r($kreivasMasyvas);


function countArraySum($arr) 
{
    $sum = 0;
    foreach ($arr as $item) {
        if (is_array($item)) {
            $sum += countArraySum($item);
        } else {
            $sum += $item;
        }
    }
    return $sum;
}

echo "\nSum: " . countArraySum($kreivasMasyvas);

$zaliasPuslapis = [
    'title' => '',
    'subTitle' => '',
    'services' => [
        'about' => [
            'text' => '',
            'text' => ''
        ],
        'about' => [
            'text' => ''
        ],
        'about' => [
            'text' => '',
            'text' => '',
            'text' => ''
        ]
    ]
];

print_r($zaliasPuslapis);

function labas()
{
    static $x = 0; // statinė vidinio funkcijos kintamojo deklaracija

    $x = $x + 1;

    echo "<br>X: $x";
}

labas();
labas();
labas();

 // $arr kintamasis turi būti array arba int tipo
function darbasSuMasyvais(array|int $arr) : ?int // grąžint turi int araba NULL (?)
{
    if (is_int($arr)) {

        if ($arr === 0) {
            return null;
        }

        return $arr;
    }    

    return count($arr);
}

$mas = [1, 3, 7];


$rez = darbasSuMasyvais(0);

echo "<h2>rezultatas: $rez</h2>";


// Anoniminė

$anomFun = function() {
    echo '<h2>FUN FUN</h2>';
};

$anomFun();


$colors = ['Orange', 'Blue', 'Green', 'Yellow', 'Red'];

$raide = 2;


usort($colors, function($a, $b) use ($raide) { // su use $raide yra perduodama į funkcijos vidų
    return $a[$raide] <=> $b[$raide];
});

$raide = 1;

// Arrow funkcija
// Gali būti tik 1 eilutė
// Kintamieji į vidų iš išorės patenka

usort($colors, fn($a, $b) => $a[$raide] <=> $b[$raide]);



echo '<br>';

print_r($colors);

