<?php

abstract class Miskas implements Flora {

    public $plotas = 500;
    public $pavadinimas = 'Juodas Miškas';
    public $dangus = 'Mėlynas';

    public static $kas = 'Kelmas';

    public function valio2()
    {
        $this->grybai('');
    }

    public function miskoKas()
    {
        echo '<h3>' . self::$kas . '</h3>'; // statinis klasės be šeimos
        echo '<h3>' . static::$kas . '</h3>'; // statinis klasės su galimu perrašymu iš vaikinės klasės
    }

    public function samanos()
    {
        
    }

    abstract public function grybai(string $A);

}