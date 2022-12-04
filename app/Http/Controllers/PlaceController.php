<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Place;
use App\Models\Building;
use App\Models\Road;

class PlaceController extends Controller
{
    public function list()
    {

        return view('places.list', [
            'places' => Place::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('places.add', [
            'buildings' => Building::all(),
            'roads' => Road::all(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'address' => 'nullable',
            'x' => 'required|numeric|max:64',
            'y' => 'required|numeric|max:64',
            'width' => 'required|numeric|max:64',
            'height' => 'required|numeric|max:64',
            'building_id' => 'required',
            'place_id' => 'required',
        ]);

        $place = new Place();
        $place->create($attributes);

        return redirect('/places/list')
            ->with('message', 'Place has been added!');

    }

    public function editForm(Place $place)
    {

        return view('places.edit', [
            'place' => $place,
            'buildings' => Building::all(),
            'roads' => Road::all(),
        ]);

    }

    public function edit(Place $place)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'address' => 'nullable',
            'x' => 'required|numeric|max:64',
            'y' => 'required|numeric|max:64',
            'width' => 'required|numeric|max:64',
            'height' => 'required|numeric|max:64',
            'building_id' => 'required',
            'place_id' => 'required',
        ]);

        $place->update($attributes);

        return redirect('/places/list')
            ->with('message', 'Place has been edited!');

    }

    public function delete(Place $place)
    {
        
        $place->delete();

        return redirect('/places/list')
            ->with('message', 'Place has been deleted!');                
        
    }

}
