<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\TruckBrand;
use App\Models\Tag;
use App\Models\TruckImage;

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

        $filterTag = $request->query('tag'); // gauname tag parametro reikšmę iš URL
        if ($filterTag) {
            $trucksQuery->whereHas('tags', function ($query) use ($filterTag) {
                $query->where('name', 'like', '%' . $filterTag . '%'); // ne tiksliai, bet ir dalinai atitinkantį tagą ieškome
                // tiksliai atitinkantį tagą ieškome
                // $query->where('name', $filterTag);
            });
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
            'truck_brand_id' => 'required|exists:truck_brands,id',
            //<input type="file" name="images[]">
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);



        $truckId = Truck::create($request->all())->id;

        // Save images if they exist
        if ($request->hasFile('images')) {
              foreach ($request->file('images') as $image) {
                $savePath = public_path('images/trucks');
                $fileName = time() . '_' . $image->getClientOriginalName();
                $image->move($savePath, $fileName);
                $path = 'images/trucks/' . $fileName;
                TruckImage::create([
                    'truck_id' => $truckId,
                    'image_path' => $path
                ]);
            }
        }

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
        
        // to delete images
        // get existing images ids
        $existingImageIds = $truck->images()->pluck('id')->toArray();

        $existingInRequest = $request->input('existing_images', []); // gauname esamų nuotraukų ID, kurie buvo išsiųsti su forma

        // ištriname nuotraukas, kurios yra duomenų bazėje, bet nebuvo išsiųstos su forma (naudotojas jas pašalino)
        $imagesToDelete = array_diff($existingImageIds, $existingInRequest);

        // get indexes of images that were sent with the form
        $sentImageIndexes = array_keys($request->file('images')); // gauname indeksus tų nuotraukų, kurios buvo išsiųstos su forma
        
        $imagesToEdit = [];
        foreach ($sentImageIndexes as $index) {
            if ($existingInRequest[$index] != 0) { // jei tai nėra nauja nuotrauka (naujos nuotraukos turi reikšmę 0)
                $imagesToEdit[] = [
                    'id' => (int) $existingInRequest[$index], // pridedame prie ištrynimo sąrašo
                    'file' => $request->file('images')[$index] // pridedame prie redagavimo sąrašo
                ];
            }
        }
        $imagesToCreate = [];
        foreach ($sentImageIndexes as $index) {
            if ($existingInRequest[$index] == 0) { // jei tai yra nauja nuotrauka (naujos nuotraukos turi reikšmę 0)
                $imagesToCreate[] = $request->file('images')[$index]; // pridedame prie kūrimo sąrašo
            }
        }

        // delete images
        if (!empty($imagesToDelete)) {
            // delete files from storage
            $imagesToDeletePaths = TruckImage::whereIn('id', $imagesToDelete)->pluck('image_path')->toArray();
            // ištriname failus iš saugyklos
            foreach ($imagesToDeletePaths as $path) {
                if (file_exists(public_path($path))) {
                    unlink(public_path($path)); // ištriname failą iš saugyklos
                }
            }
            // delete records from database
            TruckImage::whereIn('id', $imagesToDelete)->delete();
        }

        // edit images
        foreach ($imagesToEdit as $imageData) {
            $image = TruckImage::find($imageData['id']);
            if ($image) {
                // delete old file
                if (file_exists(public_path($image->image_path))) {
                    unlink(public_path($image->image_path)); // ištriname seną failą iš saugyklos
                }
                // save new file
                $savePath = public_path('images/trucks');
                $fileName = time() . '_' . $imageData['file']->getClientOriginalName();
                $imageData['file']->move($savePath, $fileName);

                // save new path to database
                $image->image_path = 'images/trucks/' . $fileName;
                $image->save();
            }
        }

        // create new images
        foreach ($imagesToCreate as $imageFile) {
            $savePath = public_path('images/trucks');
            $fileName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move($savePath, $fileName);
            TruckImage::create([
                'truck_id' => $truck->id,
                'image_path' => 'images/trucks/' . $fileName
            ]);
        }


        // dd($request->all(), $imagesToDelete, $imagesToEdit, $imagesToCreate); // išveda visus užklausos duomenis, įskaitant įkeltus failus

        // atnaujiname sunkvežimio duomenis ne paveikdami nuotraukų duomenų bazės įrašus, nes juos tvarkome atskirai
        $truck->update($request->all());

        return redirect()->route('trucks-index')->with('success_zinute', 'Sunkvežimis sėkmingai atnaujintas!');
    }

    public function delete($id) {
        $truck = Truck::findOrFail($id);

        return view('tracks.delete', compact('truck'));
    }

    public function destroy($id) {
        $truck = Truck::findOrFail($id);
        
        // delete images from storage
        foreach ($truck->images as $image) {
            if (file_exists(public_path($image->image_path))) {
                unlink(public_path($image->image_path)); // ištriname failą iš saugyklos
            }
        }
        // delete image records from database
        $truck->images()->delete();

        $truck->delete();

        return redirect()->route('trucks-index')->with('success_zinute', 'Sunkvežimis sėkmingai ištrintas!');
    }

    public function updateImagesOrder(Request $request, $id) {
        $truck = Truck::findOrFail($id);
        $imagesOrder = $request->input('images_order'); // gauname naują nuotraukų tvarką iš užklausos
        $truck->images_order = $imagesOrder; // atnaujiname sunkvežimio nuotraukų tvarką
        $truck->save(); // išsaugome pakeitimus duomenų bazėje

        return response()->json(['message' => 'Nuotraukų tvarka sėkmingai atnaujinta!']);
    }
}
