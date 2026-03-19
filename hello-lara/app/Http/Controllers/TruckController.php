<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\TruckBrand;

class TruckController extends Controller
{
    public function index() {
        $trucks = Truck::paginate(17);

        return view('tracks.read', compact('trucks'));
    }

    public function create() {
        // $truckBrands = TruckBrand::all(); // gauname visus modelius, kad galėtume pasirinkti kuriam priklauso sunkvežimis
        // pagal abėcėlę išrikiuojame modelius
        $truckBrands = TruckBrand::orderBy('name')->get();
        
        return view('tracks.create', compact('truckBrands'));
    }

    public function store(Request $request) {
        $request->validate([
            'color' => 'required|min:3|max:255',
            'power' => 'required|integer|min:1',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'truck_brand_id' => 'required|exists:truck_brands,id'
        ]);

        Truck::create($request->all());

        return redirect()->route('trucks-index')->with('success', 'Sunkvežimis sėkmingai pridėtas!');
    }

    public function show($id) {
        $truck = Truck::findOrFail($id);

        return view('tracks.show', compact('truck'));
    }

    public function edit($id) {
        $truck = Truck::findOrFail($id);
        $truckBrands = TruckBrand::orderBy('name')->get();

        return view('tracks.edit', compact('truck', 'truckBrands'));
    }

    public function update(Request $request, $id) {
        $truck = Truck::findOrFail($id);

        $request->validate([
            'color' => 'required|min:3|max:255',
            'power' => 'required|integer|min:1',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'truck_brand_id' => 'required|exists:truck_brands,id'
        ]);

        $truck->update($request->all());

        return redirect()->route('trucks-index')->with('success', 'Sunkvežimis sėkmingai atnaujintas!');
    }

    public function delete($id) {
        $truck = Truck::findOrFail($id);

        return view('tracks.delete', compact('truck'));
    }

    public function destroy($id) {
        $truck = Truck::findOrFail($id);
        $truck->delete();

        return redirect()->route('trucks-index')->with('success', 'Sunkvežimis sėkmingai ištrintas!');
    }
}
