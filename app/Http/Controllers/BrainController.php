<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Brain;
use App\Models\BrainType;
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
            'types' => BrainType::all(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'map_id' => 'required',
            'brain_type_id' => 'required',
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
            'types' => BrainType::all(),
        ]);

    }

    public function edit(Brain $brain)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'map_id' => 'required',
            'brain_type_id' => 'required',
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

}
