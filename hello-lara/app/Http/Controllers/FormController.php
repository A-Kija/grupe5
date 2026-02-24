<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showGetForm()
    {
        return view('forms.get');
    }

    public function showSumFromGet(int $d1, int $d2)
    {
        $rez = $d1 + $d2;

        return view('forms.get_result', ['rez' => $rez]);
    }
}
