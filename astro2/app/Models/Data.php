<?php

namespace Astro\Note\Models;


interface Data {
    
    function read() : array; // masyvas su visų duomenų objektais

    function store(object $data) : bool;

    function update(int $id, object $data) : bool;

    function destroy(int $id) : bool;

    function show(int $id) : object; // objektas pagal id

}