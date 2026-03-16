<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Box;

class BoxController extends Controller
{
    public function helloBox()
    {
        return Inertia::render('HelloBox', [
            'number' => 'No 7',
            'boxesUrl' => route('get-boxes'),
            'saveBoxesUrl' => route('save-boxes'),
            ]);
    }

    public function helloOldBox()
    {
        return view('hello_box', [
            'number' => 'No 7',
        ]);
    }

    public function getBoxes()
    {
        
        sleep(1);

        $boxes = Box::all()->map(function ($box) {
            return [
                'number' => $box->number,
                'color' => $box->color,
                'id' => $box->box_id, // neatitikimas recte 'id' ir box_id, todėl React'e bus box.id, o ne box.box_id
            ];
        });

        return response()->json([
            'boxes' => $boxes,
            'status' => 'ok'
        ]);
    }

    public function saveBoxes(Request $req)
    {
        // dd($req->all()); // ką tiksliai atsiuntė React'as
        // dd($req->sq); // tik dėžės duomenys
        /*
        array:3 [ // app\Http\Controllers\BoxController.php:42
            0 => array:3 [
                "number" => 1022
                "color" => "#73d6ac"
                "id" => 492504058
            ]
            1 => array:3 [
                "number" => 2771
                "color" => "#501e01"
                "id" => 940657982
            ]
            2 => array:3 [
                "number" => 6984
                "color" => "#41cb6d"
                "id" => 912207415
            ]
        ]
        */

        $allDbBoxes = Box::all(); // Kolekcija visų dėžių duomenų bazėje
        $allReqBoxes = collect($req->sq); // Kolekcija visų dėžių duomenų, atsiųstų iš React'o

        // Boxes to add to DB
        $boxesToAdd = $allReqBoxes->filter(function ($reqBox) use ($allDbBoxes) {
            return !$allDbBoxes->contains('box_id', $reqBox['id']);
        });

        // Boxes to delete from DB
        $boxesToDelete = $allDbBoxes->filter(function ($dbBox) use ($allReqBoxes) {
            return !$allReqBoxes->contains('id', $dbBox->box_id);
        });

        // Add new boxes to DB
        foreach ($boxesToAdd as $box) {
            Box::create([
                'number' => $box['number'],
                'color' => $box['color'],
                'box_id' => $box['id'],
            ]);
        }

        // Delete boxes from DB
        foreach ($boxesToDelete as $box) {
            $box->delete();
        }

        // return with report
        return response()->json([
            'added' => $boxesToAdd->count(),
            'deleted' => $boxesToDelete->count(),
            'status' => 'ok'
        ]);

    }

}
