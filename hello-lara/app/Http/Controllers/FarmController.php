<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Http\Requests\StoreFarmRequest;
use App\Http\Requests\UpdateFarmRequest;


/*
Funkcijų vardai pagal CRUD:

read, show, create, edit, delete (rodomieji)
return view

store, update, destroy (vykdomieji)
return redirect

CRUD metodai formoje:

get form=>GET    visi rodomieji
post form=>POST vykdomasis store
delete form=>POST + @method('DELETE') vykdomasis destroy
put  form=>POST + @method('PUT') vykdomasis update

Laravel metodai:

read => ::all()
create => ---
store => ::create
delete => ::find
destroy => ::find->delete
edit => ::find
update => ::find->update

Ko reikia metodams:

read => ---
create => ---
store => Request(data)
delete => id(int)
destroy => id(int)
edit => id(int)
update => Request(data), id(int)
show => id(int)

*/



class FarmController extends Controller
{
    public function read()
    {
        // $animals = Farm::all(); // visi gyvuliai iš DB
        // $animals yra KOLEKCIJA (gudrus masyvas apiformintas kaip objektas)

        // $animals = $animals->sortByDesc('weight'); // Gautą kolekciją parūšiuojam pagal svorį atgal


        $animals = 
        Farm::orderBy('weight', 'desc')
        // ->where('animal', 'avis') // tik avis
        // ->get(); // duoda rezultatą
        ->paginate(11); // duoda rezultatą su puslapiavimu (11 įrašų viename puslapyje) ir automatiškai tvarko puslapių nuorodas view'e
        // visi gyvuliai iš DB, surūšiuoti pagal svorį atbulai

        $weightSum = $animals->sum('weight'); // Gautos kolekcijos svorio suma

        return view('farm.read', ['animals' => $animals, 'weightSum' => $weightSum]);
    }

    public function create()
    {
        return view('farm.create', ['animals' => Farm::ANIMALS]);
    }

    public function store(StoreFarmRequest $req)
    {
        Farm::create($req->all()); // prideda naują į DB 
        // $req->all() viskas ką siunčia requestas

        return redirect()->route('farm-read')->with('success_zinute', 'Gyvulys sėkmingai pridėtas!'); 
        // nukreipia į read metodą su success žinute, kurią galima parodyti read view'e
    }

    public function delete(int $id)
    {
        $animal = Farm::find($id);
        
        return view('farm.delete', ['animal' => $animal]);
    }

    public function destroy(int $id)
    {
        $animal = Farm::find($id);
        $animal->delete();

        return redirect()->route('farm-read')->with('info_zinute', 'Gyvulys sėkmingai ištrintas!');
    }

    public function edit(int $id)
    {
        $animal = Farm::find($id);
        
        return view('farm.edit', ['animal' => $animal, 'animals' => Farm::ANIMALS]);
    }

    public function update(UpdateFarmRequest $req, int $id)
    {
        $animal = Farm::find($id);
        $animal->update($req->all());

        return redirect()->route('farm-read')->with('success_zinute', 'Gyvulys sėkmingai atnaujintas!');
    }

    public function show(int $id)
    {
        $animal = Farm::find($id);
        
        return view('farm.show', ['animal' => $animal]);
    }
}
