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
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('logo_image')) {
            // kur saugoti failą
            // $savePath = public_path('images/truck_brands');
            $savePath = 'C:\xampp\htdocs\grupe5\hello-lara\public\images\truck_brands';
            // sukurti unikalų failo pavadinimą
            $fileName = time() . '_' . $request->file('logo_image')->getClientOriginalName();
            $request->file('logo_image')->move($savePath, $fileName);
            $fileName = 'images/truck_brands/' . $fileName;
        }

        TruckBrand::create([
            'name' => $request->name,
            'logo_image' => isset($fileName) ? $fileName : null,
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
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $truckBrand = TruckBrand::findOrFail($id);

        if ($request->has('remove_logo') && $request->input('remove_logo') == '1') {
                       
            if ($truckBrand->logo_image && file_exists(public_path($truckBrand->logo_image))) {
                unlink(public_path($truckBrand->logo_image)); // ištriname seną logotipą iš serverio
            }
            $truckBrand->logo_image = null; // nustatome logotipą kaip null, jei vartotojas pasirinko jį pašalinti
        
        } else {

            if ($request->hasFile('logo_image')) {
                $savePath = 'C:\xampp\htdocs\grupe5\hello-lara\public\images\truck_brands';
                $fileName = time() . '_' . $request->file('logo_image')->getClientOriginalName();
                $request->file('logo_image')->move($savePath, $fileName);
                $fileName = 'images/truck_brands/' . $fileName;

                // ištriname seną logotipą, jei jis buvo
                if ($truckBrand->logo_image && file_exists(public_path($truckBrand->logo_image))) {
                    unlink(public_path($truckBrand->logo_image));
                }

                $truckBrand->logo_image = $fileName;
            }
        }

        $truckBrand->update([
            'name' => $request->name,
            'logo_image' => $truckBrand->logo_image, // atnaujiname logotipą tik jei įkeltas naujas failas
        ]);

        return redirect()->route('truck-brands-index')->with('success_zinute', 'Modelis sėkmingai atnaujintas');
    }

    public function show($id) {
        $truckBrand = TruckBrand::findOrFail($id);
        $fromPage = request()->query('from-page', 1); // gauname iš URL query parametro 'from-page', jei nėra, tai priskiriame 1
        return view('truck_brands.show', compact('truckBrand', 'fromPage'));
    }

    public function delete($id) {
        $truckBrand = TruckBrand::findOrFail($id);

        // dd($truckBrand->trucks); // išveda visus sunkvežimius, kurie priklauso šiai markei kaip kolekciją

        //dd($truckBrand->trucks()); // išveda visus sunkvežimius, kurie priklauso šiai markei, bet kaip query builder objektą, o ne kolekciją

        // dd($truckBrand->trucks->count()); // išveda sunkvežimių skaičių, kurie priklauso šiai markei
        
        // dd($truckBrand->trucks()->count()); // išveda sunkvežimių skaičių, kurie priklauso šiai markei, bet naudojant query builder metodą

        if ($truckBrand->trucks()->count() > 0) {
            return redirect()->route('truck-brands-index', ['page' => request()->query('from-page', 1)])->with('info_zinute', 'Negalima ištrinti modelio, nes yra priskirtų sunkvežimių');
        }
        
        $fromPage = request()->query('from-page', 1);
        return view('truck_brands.delete', compact('truckBrand', 'fromPage'));
    }

    public function destroy($id) {
        $truckBrand = TruckBrand::findOrFail($id);
        $truckBrand->delete();

        $fromPage = request()->query('from-page', 1);
        return redirect()->route('truck-brands-index', ['page' => $fromPage])->with('success_zinute', 'Modelis sėkmingai ištrintas');
    }
}
