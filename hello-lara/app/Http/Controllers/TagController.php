<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index() {

        $tags = Tag::paginate(7);

        return view('tags.read', compact('tags'));
    }

    public function create() {
        return view('tags.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:30|unique:tags,name',
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags-index')->with('success_zinute', 'Žymė sėkmingai pridėta');
    }

    public function edit($id) {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:3|max:30|unique:tags,name,' . $id,
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tags-index')->with('success_zinute', 'Žymė sėkmingai atnaujinta');
    }

    public function show($id) {
        $tag = Tag::findOrFail($id);
        $fromPage = request()->query('from-page', 1);
        return view('tags.show', compact('tag', 'fromPage'));
    }

    public function delete($id) {
        $tag = Tag::findOrFail($id);

        // if ($tag->trucks()->count() > 0) {
        //     return redirect()->route('tags-index', ['page' => request()->query('from-page', 1)])->with('info_zinute', 'Negalima ištrinti žymės, nes ji priskirta sunkvežimiams');
        // }

        $fromPage = request()->query('from-page', 1);
        return view('tags.delete', compact('tag', 'fromPage'));
    }

    public function destroy($id) {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        $fromPage = request()->query('from-page', 1);
        return redirect()->route('tags-index', ['page' => $fromPage])->with('success_zinute', 'Žymė sėkmingai ištrinta');
    }


    public function addToTruck(Request $request, $id) {
        
        $tagName = $request->input('tag_name');

        // slugify name
        $tagName = Str::slug($tagName);

        $truckId = $id;

        $tag = Tag::where('name', $tagName)->first();
        /*

        The Query Builder Pattern

        The expression uses method chaining, a common pattern in Laravel. 
        It starts with Tag::where(...), which begins constructing a database 
        query against the tags table (implied by the Tag model). The where() method adds a 
        condition to filter results.

        */

        if (!$tag) {
            // create new tag if it doesn't exist
            $tag = Tag::create(['name' => $tagName]);
        }

        if (!$tag->trucks()->where('trucks.id', $truckId)->exists()) {
            $tag->trucks()->attach($truckId); // prideda įrašą į tarpinę lentelę, kuris susieja tagą su sunkvežimiu
            return redirect()->back()->with('success_zinute', 'Žymė sėkmingai pridėta prie sunkvežimio');
        }

        return redirect()->back()->with('info_zinute', 'Žymė jau priskirta šiam sunkvežimiui');
    }

    public function removeFromTruck($tag_id, $truck_id) {
        $tag = Tag::findOrFail($tag_id); // tagas kuris bus pašalintas iš sunkvežimio
        $tag->trucks()->detach($truck_id); // pašalina įrašą iš tarpinės lentelės, kuris susieja tagą su sunkvežimiu

        // atvirkščiai, galima būtų rasti sunkvežimį ir naudoti detach metodą iš sunkvežimio pusės:
        // $truck = Truck::findOrFail($truck_id);
        // $truck->tags()->detach($tag_id);

        return redirect()->back()->with('success_zinute', 'Žymė sėkmingai pašalinta iš sunkvežimio');
    }

}
