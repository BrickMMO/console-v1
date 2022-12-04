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

}
