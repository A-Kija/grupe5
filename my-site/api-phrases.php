<?php

$phrases = [
    'Explore the latest fashion trends and timeless classics',
    'Discover the hottest summer fashion trends that will make you stand out this season.',
    'Learn how to build a capsule wardrobe that\'s both stylish and sustainable.',
    'Master the art of accessorizing and elevate any outfit with the right pieces.',
    'Your daily dose of fashion inspiration',
    'Racoons wear the best styles!',
    'Stay stylish, stay confident.',
    'Fashion is the armor to survive the reality of everyday life.',
    'Dress like you\'re already famous.', // backslashintas specialią prasmę turintis simbolis ją praranda
    'Style is a way to say who you are without having to speak.',
    'Clothes mean nothing until someone lives in them.',
    'Fashion is what you buy. Style is what you do with it.',
];

$randomIndex = array_rand($phrases); // paima atsitiktinį indeksą iš masyvo
$randomPhrase = $phrases[$randomIndex]; // paima frazę pagal tą indeksą

// header('Content-Type: application/json'); // nurodo, kad grąžinamas turinys yra JSON formato
echo json_encode( // JS ==> JSON.stringify()
    [
        'phrase' => $randomPhrase // JS tai matys kaip objektą su savybe "phrase"
    ]
); // grąžina frazę JSON formatu