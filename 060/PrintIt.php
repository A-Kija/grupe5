<?php

trait PrintIt {

    public function printArray($array)
    {
        foreach($array as $index => $value) {
            echo "<div><b>$index:</b><i>$value</i></div>";
        }
    }
    public function kas()
    {
        echo '<h1>Trait1</h1>';
    }
}