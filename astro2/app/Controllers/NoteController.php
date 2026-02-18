<?php
namespace Astro\Note\Controllers;

use Astro\Note\Models\DB;
use Astro\Note\App;

class NoteController {

    private $db;
    private $table = 'notes';

    public function __construct()
    {
        $this->db = new DB($this->table);
    }
    

    public function home()
    {
        $data = $this->db->read();

        usort($data, fn($a, $b) => $b->date <=> $a->date);

        return App::view('home', ['notes' => $data]);
    }

    public function show(int $id)
    {
        $data = $this->db->show($id);

        return App::view('note', ['note' => $data]);
    }

    public function create()
    {
        return App::view('create');
    }

}
