<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BebrasController extends Controller
{
    public function paprastasBebras()
    {
        return '<h2>Papratasis Bebras</h2>';
    }

    public function bladeBebras()
    {
        return view('bebras.labas'); // NIEKO BENDRO SU URL!!!!!!!!!!!!
    }

    // $spalva yra parametras iš routo
    public function spalvotasBebras(string $spalva)
    {

        return view('bebras.spalvotas', ['bebroSpalva' => $spalva]);

    }
}
