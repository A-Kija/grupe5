<?php

require __DIR__ . '/Tv.php';

$ltKanalai = [
    4 => 'LNK',
    5 => 'TV3',
    6 => 'Polonia TV',
    7 => 'Animal Planet',
    8 => 'Balticum'
];


$tv1 = new Tv('Sony', '56');
$tv2 = new Tv('Samsung', '101');
$tv3 = new Tv('Samsung', '68');

$tv1->parduoti('Jonas', $ltKanalai);
$tv2->parduoti('Onutė', $ltKanalai);
$tv3->parduoti('Barsukas', $ltKanalai);

$tv1->perjungti(2);
$tv2->perjungti(6);
$tv3->perjungti(7);

$tv1->kaZiuri();
$tv2->kaZiuri();
$tv3->kaZiuri();

echo '<pre>';

print_r($tv1);
print_r($tv2);
print_r($tv3);