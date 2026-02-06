<?php

function router()
{
    $uri = $_SERVER['REQUEST_URI'];
    $uri = str_replace(INSTALL_DIR, '', $uri);
    $uri = explode('/', $uri);
    $method = $_SERVER['REQUEST_METHOD'];

    if ('GET' == $method && $uri[0] == '') {
        return homeController();
    }

    if ('GET' == $method && $uri[0] == 'note') {
        return noteController();
    }

    if ('GET' == $method && $uri[0] == 'create') {
        return createController();
    }

    if ('POST' == $method && $uri[0] == 'store') {
        return storeController();
    }
   
}


function homeController()
{
    $pageData = [];

    $pageData['title'] = 'Home';

    $notes = json_decode(file_get_contents(DIR . 'data/notes.json'), true) ?? [];

    $pageData['notes'] = $notes;

    return view('home', $pageData);
}

function noteController()
{
    return view('note');
}

function createController()
{
    $pageData = [];

    $pageData['title'] = 'Create';

    return view('create', $pageData);
}

function storeController()
{
    $storeData['date'] = $_POST['date'] ?? '';
    $storeData['title'] = $_POST['title'] ?? '';
    $storeData['content'] = $_POST['content'] ?? '';
    $storeData['id'] = rand(100000000, 999999999);

    // read from data/notes.json
    $notes = json_decode(file_get_contents(DIR . 'data/notes.json'), true) ?? [];
    // add new note to array
    $notes[] = $storeData;
    // save back to data/notes.json
    file_put_contents(DIR . 'data/notes.json', json_encode($notes, JSON_PRETTY_PRINT));

    header('Location: ' . URL);
    return '';
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