<?php

class Zveris extends Miskas {

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

}