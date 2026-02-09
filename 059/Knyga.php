<?php
namespace Mano\Ir\Tik\Mano;

// use Ka\Ziureti\Dabar\Tv as ggg;
use Ka\Ziureti\Dabar\Tv;
use Ramsey\Uuid\Uuid; 

class Knyga extends Tv {

    public $pavadinimas = '6 mėnesiai iki Pasaulio pabaigos';


    public function goWild()
    {
        $uuid = Uuid::uuid4();
        echo $uuid->toString();
    }

}