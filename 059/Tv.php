<?php
namespace Ka\Ziureti\Dabar;


class Tv {

    private $ekranoDydis;
    private $gamintojas;
    private $savininkas;
    private static $kanalai = []; // statinis
    private $kanalas;
    
    public static function pridetiKanalus($kanalai)
    {
        self::$kanalai = $kanalai; // pasiekiame statinę savybę
        // self yra klasės vardo atitikmuo
    }

    
    public function __construct($gamintojas, $ekranoDydis)
    {
        $this->gamintojas = $gamintojas;
        $this->ekranoDydis = $ekranoDydis;
    }

    public function parduoti($kam)
    {
        $this->savininkas = $kam;
    }

    public function perjungti($kanalas)
    {
        $this->kanalas = $kanalas;
    }

    public function kaZiuri()
    {
        if (!isset(self::$kanalai[$this->kanalas])) {
            echo "<h3> {$this->savininkas} per televizorių mato baltą triukšmą </h3>";
        } else {
            echo "<h3> {$this->savininkas} per televizorių mato " . self::$kanalai[$this->kanalas] . '</h3>';
        }
    }

    // public function keistiKanalus($kanalai)
    // {
    //     $this->kanalai = $kanalai;
    // }

}