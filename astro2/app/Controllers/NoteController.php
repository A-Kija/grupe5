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

        usort($data, function($a, $b){
            if ($b->date > $a->date) return 1;
            if ($b->date < $a->date) return -1;
            // else 0
            if ($b->id > $a->id) return 1;
            if ($b->id < $a->id) return -1;
            return 0; // kaip ir nereikia šito galima išmest
        });

        return App::view('home', ['notes' => $data, 'title' => 'List']);
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

    public function delete(int $id)
    {
        $data = $this->db->show($id);

        return App::view('delete', ['note' => $data]);
    }

    public function edit(int $id)
    {
        $data = $this->db->show($id);

        return App::view('edit', ['note' => $data]);
    }

    public function store()
    {
        $data = (object) $_POST; // masyvą verčiam į objektą
        
        $this->db->store($data);

        return App::redirect(''); //redirect į pradžią

    }

    public function destroy(int $id)
    {
        $this->db->destroy($id);

        return App::redirect('');
    }

    public function update(int $id)
    {
        // atkeliavo id skaitmuo

        /*
            $_POST
            [
                'date' => 'fdgfdgfd'
                'title' => 'fdgfdgfd'
                'content' => 'fdgfdgfd'
            ]
        */
    
        $data = (object) $_POST;

        /*
            $data
            {
                'date' -> 'fdgfdgfd'
                'title' -> 'fdgfdgfd'
                'content' -> 'fdgfdgfd'
            }
        */

        $this->db->update($id, $data);

        // perduodam 'note/52'

        return App::redirect('note/' . $id);
    }

}
