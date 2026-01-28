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


function countArraySum($arr) {
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
