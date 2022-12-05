<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Map;
use App\Models\MapSquare;
use App\Models\Road;

class RoadController extends Controller
{
    public function list()
    {

        return view('roads.list', [
            'roads' => Road::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('roads.add', [
            'maps' => Map::all(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'map_id' => 'required',
        ]);

        $road = new Road();
        $road->create($attributes);

        return redirect('/roads/list')
            ->with('message', 'Road has been added!');

    }

    public function editForm(Road $road)
    {

        return view('roads.edit', [
            'road' => $road,
            'maps' => Map::all(),
        ]);

    }

    public function edit(Road $road)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'map_id' => 'required',
        ]);

        $road->update($attributes);

        return redirect('/roads/list')
            ->with('message', 'Road has been edited!');

    }

    public function delete(Road $road)
    {
        
        $road->delete();

        return redirect('/roads/list')
            ->with('message', 'Road has been deleted!');                
        
    }

    public function squaresForm(Road $road)
    {

        $map = Map::where('id', $road->map_id)->first();

        return view('roads.squares', [
            'road' => $road,
            'map' => $map,
        ]);

    }

    public function squares(Road $road, Request $request)
    {

        $squares = $request->input('square');

        MapSquare::where('road_id', $road->id)->update(['road_id' => 0]);

        foreach($request->squares as $key => $value)
        {

            if($value == 'on')
            {
                MapSquare::where('id', $key)->update(['road_id' => $road->id]);
            }

        }
        
        return redirect('/roads/list')
            ->with('message', 'Road has been edited!');      

    }

}
