<?php

function router()
{
    return view('create');
}


function view(string $template, array $data = [])
{
    extract($data); // indeksai iš masyvo yra paverčiami atskirais kintamaisiais

    // start output buffering
    ob_start();
    require DIR . 'view/top.php';
    require DIR . "view/{$template}.php";
    require DIR . 'view/bottom.php';
    // clear output buffer and return result
    return ob_get_clean();
}