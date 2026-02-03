<?php

// include __DIR__ . '/Stotele.php'; // jeigu failas nerastas, viskas veikia toliau tik su įspėjimu

// include_once __DIR__ . '/Stotele.php'; // tą patį failą įdeda tik 1 kartą

// require_once __DIR__ . '/Stotele.php'; // griežtai tikrina failo egzistavimą ir deda tik 1 kartą


require __DIR__ . '/Stotele.php'; // griežtai tikrina failo egzistavimą


$stotele1 = new Stotele('Uragano Anatolijaus Skersgatvis');

$stotele2 = new Stotele('Užkandinė "Bebro Kebabas"');




$stotele1->paslaptis = 'Barsukas';


echo '<pre>';

var_dump($stotele1);
echo '<br>';
var_dump($stotele2);

echo '<br>';

unset($stotele2);

echo $stotele1->paslaptis; // privatus per __get metodą



echo '<br>';

var_dump($stotele1->auto);

echo 'Viskai gerai';

