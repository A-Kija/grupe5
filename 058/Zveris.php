<?php

class Zveris extends Miskas implements Fauna, Fauna2 {

    public $vardas;
    public $dangus = 'Žydras';
    public static $kas = 'Uodega';

    public function __construct($vardas)
    {
        $this->vardas = $vardas;
    }

    public function valio()
    {
        echo '<h2>Mehhh...</h2>';
    }

    public function grybai($va)
    {
        echo '<h2>GrYYYYYYbai...</h2>';
    }

}