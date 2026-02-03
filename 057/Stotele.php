<?php

// klasės deklaracija

class Stotele {

    public $vardas;
    public $autobusai = [];
    private $id;
    private $paslaptis = 'Bebras';


    public function __construct($pavadinimas)
    {
        $this->id = rand(1000, 9999); // $ prieš savybę NĖRA!
        $this->vardas = $pavadinimas;
    }

    public function __destruct()
    {
        echo '<h1 style="color:crimson;">Objekto nebėra</h1>';
    }

    // pasileidžia kai mes bandome paimti nematomą arba neegzistuojantį propsą (savybę)
    public function __get($prop)
    {
        if ($prop == 'auto') {
            $this->rodytiAutobusus();
            return 'b88';
        }
    
        // $prop ==> 'id'
        return $this->$prop; // $ yra, nes tai yra savybės vardo kintamasis
    }

    // pasileidžia kai mes bandome pakeisti nematomą arba neegzistuojantį propsą (savybę)
    public function __set($prop, $value)
    {
        // būtinai reikia kažkokio tikrinimo
        $this->$prop = $value;
    }


    public function rodytiAutobusus()
    {
        if (count($this->autobusai) === 0) {
            echo '<h2 style="color:skyblue;">Autobusų nėra</h2>';
        }
    }

}