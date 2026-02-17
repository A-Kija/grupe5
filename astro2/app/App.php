<?php
namespace Astro\Note;

use Astro\Note\Controllers\NoteController;

class App
{
    
    const DIR = __DIR__ . '/../'; // rodo root folderį
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

        if ('GET' == $method && count($uri) == 1 && $uri[0] == '') {
            return (new NoteController())->home();
        }
    }
        
    

}