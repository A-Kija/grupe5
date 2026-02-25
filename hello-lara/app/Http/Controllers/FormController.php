<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showGetForm()
    {
        return view('forms.get');
    }

    public function showPostForm()
    {
        return view('forms.post');
    }

    public function showSumFromGet(Request $req)
    {
        $d1 = $req->query('digit1');
        $d2 = $req->query('digit2');
        $rez = $d1 + $d2;

        return view('forms.get_result', ['rez' => $rez]);
    }


    

    public function showSumFromPost(Request $req)
    {
        $d1 = $req->input('digit1');
        $d2 = $req->input('digit2');
        $rez = $d1 + $d2;

        return view('forms.post_result', ['rez' => $rez]);
    }
}
