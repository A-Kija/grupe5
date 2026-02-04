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

Tv::pridetiKanalus($ltKanalai); // statinės funkcijos dirba su klasės vardu

$tv1->parduoti('Jonas');
$tv2->parduoti('Onutė');
$tv3->parduoti('Barsukas');

$tv1->perjungti(2);
$tv2->perjungti(6);
$tv3->perjungti(7);

$ltNaujiKanalai = [
    1 => 'LNK',
    2 => 'TV3',
    3 => 'Polonia TV',
    4 => 'Animal Planet',
    5 => 'Balticum'
];
Tv::pridetiKanalus($ltNaujiKanalai);

// $tv1->keistiKanalus($ltNaujiKanalai);
// $tv2->keistiKanalus($ltNaujiKanalai);
// $tv3->keistiKanalus($ltNaujiKanalai);

$tv1->kaZiuri();
$tv2->kaZiuri();
$tv3->kaZiuri();

echo '<pre>';

print_r($tv1);
print_r($tv2);
print_r($tv3);