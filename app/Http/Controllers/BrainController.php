<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Brain;
use App\Models\Hub;
use App\Models\Building;
use App\Models\Map;

class BrainController extends Controller
{
    public function list()
    {

        return view('brains.list', [
            'brains' => Brain::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('brains.add', [
            'maps' => Map::all(),
            'hubs' => Hub::all(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'map_id' => 'required',
            'hub_id' => 'required',
        ]);

        Brain::create($attributes);

        return redirect('/brains/list')
            ->with('message', 'Brain has been added!');

    }

    public function editForm(Brain $brain)
    {

        return view('brains.edit', [
            'brain' => $brain,
            'maps' => Map::all(),
            'hubs' => Hub::all(),
        ]);

    }

    public function edit(Brain $brain)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'map_id' => 'required',
            'hub_id' => 'required',
        ]);

        $brain->update($attributes);

        return redirect('/brains/list')
            ->with('message', 'Brain has been edited!');

    }

    public function delete(Brain $brain)
    {
        
        Storage::delete($brain->image);
        
        $brain->delete();

        return redirect('/brains/list')
            ->with('message', 'Brain has been deleted!');                
        
    }

    public function portsForm(Brain $brain)
    {

        return view('brains.edit', [
            'brain' => $brain,
            'maps' => Map::all(),
            'hubs' => Hub::all(),
        ]);

    }

    public function ports(Brain $brain)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'map_id' => 'required',
            'hub_id' => 'required',
        ]);

        $brain->update($attributes);

        return redirect('/brains/list')
            ->with('message', 'Brain has been edited!');

    }

}
