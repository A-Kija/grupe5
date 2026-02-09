<?php

class MaironioLibrary extends Library
{   
    
    // naudojami traitai

    use PrintIt, PrintIt2 {
        PrintIt2::kas insteadof PrintIt; // prioretizavimas traituose
        PrintIt::kas as kasKas;
    }
    



    // public function kas()
    // {
    //     echo '<h1>Maironis</h1>';
    // }

    // iš parsisiųstos Library klasės netiko vienas metodas todėl buvo pakeistas    
    public function addBook(string $title, string $author, string $isbn): void
    {
        $this->books[] = [
            'title' => $title,
            'author' => $author,
            'isbn' => $isbn,
            'available' => true,
            'new' => true // pokytis
        ];
    }


}