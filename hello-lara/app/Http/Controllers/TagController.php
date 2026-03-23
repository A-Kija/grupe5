<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

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

        if ($tag->trucks()->count() > 0) {
            return redirect()->route('tags-index', ['page' => request()->query('from-page', 1)])->with('info_zinute', 'Negalima ištrinti žymės, nes ji priskirta sunkvežimiams');
        }

        $fromPage = request()->query('from-page', 1);
        return view('tags.delete', compact('tag', 'fromPage'));
    }

    public function destroy($id) {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        $fromPage = request()->query('from-page', 1);
        return redirect()->route('tags-index', ['page' => $fromPage])->with('success_zinute', 'Žymė sėkmingai ištrinta');
    }
}
