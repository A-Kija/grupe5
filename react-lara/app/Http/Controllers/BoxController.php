<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class BoxController extends Controller
{
    public function helloBox()
    {
        return Inertia::render('HelloBox', ['number' => 'No 7']);
    }

    public function helloOldBox()
    {
        return view('hello_box', ['number' => 'No 7']);
    }

}
