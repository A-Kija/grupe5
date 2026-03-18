<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;

class TruckController extends Controller
{
    public function index() {
        $trucks = Truck::paginate(7);

        return view('tracks.read', compact('trucks'));

        /*
            compact('trucks')

            yra tas pats kas

            ['trucks' => $trucks]   
        */
    }
}
