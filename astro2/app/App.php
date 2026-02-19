<?php
namespace Astro\Note;

use Astro\Note\Controllers\NoteController;

class App
{
    
    const DIR = __DIR__ . '/'; // rodo root folderį
    const URL = 'http://astro.go/';
    const INSTALL_DIR = '/';
    const DB_NAME = 'astro2';

    
    public static function run()
    {
        return self::router();
    }



    public static function router()
    {
        
        // black box in
        // stringas iš url http://astro.go/ggg/444
        $uri = $_SERVER['REQUEST_URI'];
        // ištrinam tik pradžią
        $uri = preg_replace('#^' . preg_quote(self::INSTALL_DIR) . '#', '', $uri);
        $uri = explode('/', $uri);
        // black box out
         // uri masyvas su parametrais
        // ['ggg', '444']


        $method = $_SERVER['REQUEST_METHOD'];

        if ('GET' == $method && count($uri) == 1 && $uri[0] == '') {
            $noteController = new NoteController();
            return $noteController->home();
            // return (new NoteController())->home();
        }

        if ('GET' == $method && count($uri) == 2 && $uri[0] == 'note') {
            return (new NoteController())->show($uri[1]);
        }

        if ('GET' == $method && count($uri) == 1 && $uri[0] == 'create') {
            return (new NoteController())->create();
        }

        if ('GET' == $method && count($uri) == 2 && $uri[0] == 'delete') {
            return (new NoteController())->delete($uri[1]);
        }

        if ('GET' == $method && count($uri) == 2 && $uri[0] == 'edit') {
            return (new NoteController())->edit($uri[1]);
        }

        if ('POST' == $method && count($uri) == 1 && $uri[0] == 'store') {
            return (new NoteController())->store();
        }

        if ('POST' == $method && count($uri) == 2 && $uri[0] == 'destroy') {
            return (new NoteController())->destroy($uri[1]);
        }

        if ('POST' == $method && count($uri) == 2 && $uri[0] == 'update') {
            return (new NoteController())->update($uri[1]);
        }
    }


    public static function view(string $template, array $data = [])
    {
        extract($data); // indeksai iš masyvo yra paverčiami atskirais kintamaisiais

        // start output buffering
        ob_start();
        require self::DIR . 'view/top.php';
        require self::DIR . "view/{$template}.php";
        require self::DIR . 'view/bottom.php';
        // clear output buffer and return result
        return ob_get_clean();
    }
     
    public static function redirect(string $url)
    {
        header('Location: ' . self::URL . $url);
        return '';
    }
    

}