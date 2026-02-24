<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BijunasController extends Controller
{
    public function startas()
    {
        
        $skaicius = rand(1, 9);

        $geles = [
            'Tulpė',
            'Rožė',
            'Gvazdikas',
            'Narcizas',
            'Pienė',
            'Žibutės',
            'Pakalnutės'
        ]; 
    
        return view('bijunas.index', ['skaicius' => $skaicius, 'geles' => $geles]);
    }
}
