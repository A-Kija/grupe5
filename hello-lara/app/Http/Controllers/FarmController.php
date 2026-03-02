<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;

class FarmController extends Controller
{
    public function read()
    {
        $animals = Farm::all(); // visi gyvuliai iš DB
        // $animals yra KOLEKCIJA (gudrus masyvas apiformintas kaip objektas)

        $animals = $animals->sortByDesc('weight'); // Gautą kolekciją parūšiuojam pagal svorį atgal

        $weightSum = $animals->sum('weight'); // Gautos kolekcijos svorio suma

        return view('farm.read', ['animals' => $animals, 'weightSum' => $weightSum]);
    }
}
