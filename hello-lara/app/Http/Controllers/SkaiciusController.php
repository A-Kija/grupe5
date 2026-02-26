<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkaiciusController extends Controller
{
    public function forma2Skaiciai()
    {
        return view('skaiciai.du');
    }

    public function formos2SkaiciaiApdorojimas(Request $req)
    {
        
        $validated = $req->validate([
            'skaicius1' => 'required',
            'skaicius2' => 'required',
        ]);

        // jeigu validacija nepraeina - grąžinama atgal
    
    
        $sk1 = $req->input('skaicius1');
        $sk2 = $req->input('skaicius2');

        $rez = $sk1 + $sk2;

        return redirect()->route('rodymas-2')
        ->with(['rez' => $rez, 'sk1' => $sk1, 'sk2' => $sk2]);
    }

    public function formos2SkaiciaiRezultatas()
    {
        $rezultatas = session('rez', '');
        $skaicius1 = session('sk1', '');
        $skaicius2 = session('sk2', '');

        return view('skaiciai.du_rezultatas', [
            'rezultatas' => $rezultatas,
            'skaicius1' => $skaicius1,
            'skaicius2' => $skaicius2
        ]);
    }
}
