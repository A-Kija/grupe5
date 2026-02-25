<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    
    // GET

    public function showGetForm()
    {
        return view('forms.get');
    }

    public function showSumFromGet(Request $req)
    {
        $d1 = $req->query('digit1');
        $d2 = $req->query('digit2');
        $rez = $d1 + $d2;

        return view('forms.get_result', ['rez' => $rez]);
    }


    // POST
    public function showPostForm()
    {
        return view('forms.post');
    }

    public function makeSumFromPost(Request $req)
    {
        $d1 = $req->input('digit1');
        $d2 = $req->input('digit2');
        $rez = $d1 + $d2;

        // session(['rez' => $rez]); // įrašom į sesiją (pastovus)

        return redirect()->route('rezultato-rodymas')
        ->with(['rez' => $rez]); // flash to session (vienkartinis panaudojimas)
    }




    public function showSumFromPost()
    {
        $rez = session('rez', 'Nėra'); // imam rez, jeigu nieko nėra tada "Nėra"

        return view('forms.post_result', ['rez' => $rez]);
    }
}
