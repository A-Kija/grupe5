<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\TruckBrand;

class TruckController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']); // visos funkcijos reikalauja autentifikacijos, išskyrus index ir show
        // $this->middleware('auth'); niekur nekeleis, tai visos funkcijos reikalauja autentifikacijos
    }

    public function index(Request $request) {
        $sortOptions = Truck::SORTABLE;
        $perPageOptions = Truck::PER_PAGE_OPTIONS;
        $trackBrands = TruckBrand::orderBy('name')->get(); // gauname visus modelius, kad galėtume rodyti juos kaip filtravimo parinktį
        // $trucks = Truck::paginate(17);
        // with sorting
        $trucksQuery = Truck::query(); // užklausų gabaliukai duomenų bazės užklausoms kurti
        // $sort = request('sort'); // gauname sort parametro reikšmę iš URL
        $sort = $request->query('sort'); // gauname sort parametro reikšmę iš URL

        // AI Gaidynas
        // if ($sort && array_key_exists($sort, $sortOptions)) {
        //     switch ($sort) {
        //         case 'power_asc':
        //             $trucksQuery->orderBy('power', 'asc');
        //             break;
        //         case 'power_desc':
        //             $trucksQuery->orderBy('power', 'desc');
        //             break;
        //         case 'year_asc':
        //             $trucksQuery->orderBy('year', 'asc');
        //             break;
        //         case 'year_desc':
        //             $trucksQuery->orderBy('year', 'desc');
        //             break;
        //     }
        // }

        // AI Gaidynas - optimizuotas nesaugus
        // if ($sort && array_key_exists($sort, $sortOptions)) {
        //     [$field, $direction] = explode('_', $sort); // padalina "power_asc" į ["power", "asc"]
        //     $trucksQuery->orderBy($field, $direction);
        // }

        // Kaip reikia naudojant match

        $trucksQuery = match ($sort) {
            'power_asc' => $trucksQuery->orderBy('power', 'asc'),
            'power_desc' => $trucksQuery->orderBy('power', 'desc'),
            'year_asc' => $trucksQuery->orderBy('year', 'asc'),
            'year_desc' => $trucksQuery->orderBy('year', 'desc'),
            default => $trucksQuery
        };

        $filterModel = $request->query('model'); // gauname model parametro reikšmę iš URL
        if ($filterModel) {
            $trucksQuery->where('truck_brand_id', $filterModel); // filtruojame pagal modelį
        }

        $perPage = $request->query('per_page', 17); // gauname per_page parametro reikšmę iš URL, numatytoji reikšmė 17
        // make sure per_page is in allowed options
        if (!in_array($perPage, $perPageOptions)) {
            $perPage = 17; // jei ne, nustatome numatytąją reikšmę
        }

        $trucks = $trucksQuery->paginate($perPage)->withQueryString(); // išlaiko sort parametro reikšmę puslapių perjungimo metu

        return view('tracks.read', compact('trucks', 'sortOptions', 'trackBrands', 'perPageOptions'));
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
