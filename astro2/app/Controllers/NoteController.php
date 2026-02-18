<?php
namespace Astro\Note\Controllers;

use Astro\Note\Models\DB;
use Astro\Note\App;

class NoteController {

    public function home()
    {
        $db = new DB('astro2', 'notes');

        $data = $db->read();

        return App::view('home', [$data]);
    }

}
