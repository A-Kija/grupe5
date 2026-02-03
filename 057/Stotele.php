<?php

// klasės deklaracija

class Stotele {

    public $vardas;
    public $autobusai = [];
    private $id;


    public function __construct($pavadinimas)
    {
        $this->id = rand(1000, 9999); // $ prieš savybę NĖRA!
        $this->vardas = $pavadinimas;
    }

    public function __destruct()
    {
        echo '<h1 style="color:crimson;">Objekto nebėra</h1>';
    }


    public function rodytiAutobusus()
    {
        if (count($this->autobusai) === 0) {
            echo '<h2 style="color:skyblue;">Autobusų nėra</h2>';
        }
    }

}