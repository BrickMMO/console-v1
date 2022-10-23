<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Building;
use App\Models\Map;
use App\Models\MapSquare;

class BuildingController extends Controller
{
    public function list()
    {

        return view('buildings.list', [
            'buildings' => Building::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('buildings.add', [
            'maps' => Map::all(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'set_num' => 'nullable',
            'color' => 'nullable',
            'map_id' => 'required',
        ]);

        $building = new Building();
        $building->create($attributes);

        return redirect('/buildings/list')
            ->with('message', 'Building has been added!');

    }

    public function editForm(Building $building)
    {

        return view('buildings.edit', [
            'building' => $building,
            'maps' => Map::all(),
        ]);

    }

    public function edit(Building $building)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'set_num' => 'nullable',
            'color' => 'nullable',
            'map_id' => 'required',
        ]);

        $building->update($attributes);

        return redirect('/buildings/list')
            ->with('message', 'Building has been edited!');

    }

    public function delete(Building $building)
    {
        
        Building::delete($building->image);
        
        $building->delete();

        return redirect('/buildings/list')
            ->with('message', 'Building has been deleted!');                
        
    }

    public function imageForm(Building $building)
    {
        return view('buildings.image', [
            'building' => $building,
        ]);
    }

    public function image(Building $building)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($building->image);
        
        $path = request()->file('image')->store('buildings');

        $building->image = $path;
        $building->save();
        
        return redirect('/buildings/list')
            ->with('message', 'Building image has been edited!');
            
    }

    public function deleteImage(Building $building)
    {

        Storage::delete($building->image);

        $building->image = "";
        $building->save();

        return redirect('/buildings/list')
            ->with('message', 'Building image has been deleted!');

    }

    public function squaresForm(Building $building)
    {

        $map = Map::where('id', $building->map_id)->first();

        return view('buildings.squares', [
            'building' => $building,
            'map' => $map,
        ]);

    }

    public function squares(Building $building, Request $request)
    {

        $squares = $request->input('square');

        MapSquare::where('building_id', $building->id)->update(['building_id' => 0]);

        foreach($request->squares as $key => $value)
        {

            if($value == 'on')
            {
                MapSquare::where('id', $key)->update(['building_id' => $building->id]);
            }

        }
        
        return redirect('/buildings/list')
            ->with('message', 'Building has been edited!');      

    }

}
