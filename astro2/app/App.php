<?php
namespace Astro\Note;

use Astro\Note\Controllers\NoteController;

class App
{
    
    const DIR = __DIR__ . '/'; // rodo root folderį
    const URL = 'http://astro.go/';
    const INSTALL_DIR = '/';

    
    public static function run()
    {
        return self::router();
    }



    public static function router()
    {
        $uri = $_SERVER['REQUEST_URI'];
        // ištrinam tik pradžią
        $uri = preg_replace('#^' . preg_quote(self::INSTALL_DIR) . '#', '', $uri);
        $uri = explode('/', $uri);
        $method = $_SERVER['REQUEST_METHOD'];

        // uri masyvas su parametrais
        // http://astro.go/ggg/444
        // ['ggg', '444']

        if ('GET' == $method && count($uri) == 1 && $uri[0] == '') {
            $noteController = new NoteController();
            return $noteController->home();
            // return (new NoteController())->home();
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
        
    

}