<?php

class Tv {

    private $ekranoDydis;
    private $gamintojas;
    private $savininkas;
    private $kanalai = [];
    private $kanalas;
    
    public function __construct($gamintojas, $ekranoDydis)
    {
        $this->gamintojas = $gamintojas;
        $this->ekranoDydis = $ekranoDydis;
    }

    public function parduoti($kam, $kanalai)
    {
        $this->savininkas = $kam;
        $this->kanalai = $kanalai;
    }

    public function perjungti($kanalas)
    {
        $this->kanalas = $kanalas;
    }

    public function kaZiuri()
    {
        if (!isset($this->kanalai[$this->kanalas])) {
            echo "<h3> {$this->savininkas} per televizorių mato baltą triukšmą </h3>";
        } else {
            echo "<h3> {$this->savininkas} per televizorių mato {$this->kanalai[$this->kanalas]} </h3>";
        }
    }

}