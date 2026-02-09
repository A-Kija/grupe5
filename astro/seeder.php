<?php
$text = 'A quiet session focused on the geometry of a pale 22-degree halo.
At 21:18 the Moon sat high in the southeast with thin cirrostratus spreading from the west. A clear halo formed with a faint outer ring. The inner ring held steady at approximately 22 degrees, while a wider 44-degree circle came and went with the cloud density.
Recorded brightness levels every five minutes. The brightest arc was at the top of the ring, showing mild color separation with a bluish inner edge and a subtle warm tint on the outside. Star field contrast reduced by about half compared to the previous night.
By 22:05 the halo faded as the cirrostratus thinned. The sky returned to darker background levels, with Orion\'s belt visible and crisp again.';

$words = explode(' ', $text);
$notes = [];

foreach (range(1, 111) as $_) {
    $wordCount = rand(50, 200);
    $randomIndices = array_rand($words, min($wordCount, count($words)));

    if ($wordCount > count($words)) {
        $randomIndices = array_merge($randomIndices, array_rand($words, $wordCount - count($words)));
    }

    $randomText = implode(' ', array_map(fn($i) => $words[$i], (array)$randomIndices));


    $randomDate = date('Y-m-d', rand(strtotime('2026-01-01'), strtotime('2026-12-31')));


    $wordCount = rand(2, 6);
    $randomIndices = array_rand($words, min($wordCount, count($words)));

    if ($wordCount > count($words)) {
        $randomIndices = array_merge($randomIndices, array_rand($words, $wordCount - count($words)));
    }

    $randomTitle = implode(' ', array_map(fn($i) => $words[$i], (array)$randomIndices));

    $randomTitle = ucfirst(strtolower(str_replace(['.', "\n"], '', $randomTitle)));

    $id = rand(100000000, 999999999);

    $storeData['date'] = $randomDate;
    $storeData['title'] = $randomTitle;
    $storeData['content'] = $randomText;
    $storeData['id'] = $id;

    $notes[] = $storeData;
}

file_put_contents(__DIR__ . '/data/notes.json', json_encode($notes, JSON_PRETTY_PRINT));

echo 'OK';