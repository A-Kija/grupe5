<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckBrand;


class TruckBrandController extends Controller
{
    public function index() {

        $truckBrands = TruckBrand::paginate(7);

        return view('truck_brands.read', compact('truckBrands'));

        /*
            compact('truckBrands')

            yra tas pats kas

            ['truckBrands' => $truckBrands]   
        */
    }

    public function create() {
        return view('truck_brands.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:30',
        ]);

        TruckBrand::create([
            'name' => $request->name,
        ]);

        return redirect()->route('truck-brands-index')->with('success_zinute', 'Modelis sėkmingai pridėtas');
    }

    public function edit($id) {
        $truckBrand = TruckBrand::findOrFail($id);
        return view('truck_brands.edit', compact('truckBrand'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:3|max:30',
        ]);

        $truckBrand = TruckBrand::findOrFail($id);
        $truckBrand->update([
            'name' => $request->name,
        ]);

        return redirect()->route('truck-brands-index')->with('success_zinute', 'Modelis sėkmingai atnaujintas');
    }

    public function show($id) {
        $truckBrand = TruckBrand::findOrFail($id);
        return view('truck_brands.show', compact('truckBrand'));
    }
}
