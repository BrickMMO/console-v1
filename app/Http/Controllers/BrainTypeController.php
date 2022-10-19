<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Brain;
use App\Models\BrainType;
use App\Models\BrainPort;

class BrainTypeController extends Controller
{
    public function list()
    {

        return view('brainTypes.list', [
            'brainTypes' => BrainType::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('brainTypes.add', [
            'brains' => Brain::all(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'set_num' => 'nullable',
            'part_num' => 'required',
        ]);

        BrainType::create($attributes);

        return redirect('/brains/types/list')
            ->with('message', 'Brain Type has been added!');

    }

    public function editForm(BrainType $brainType)
    {

        return view('brainTypes.edit', [
            'brainType' => $brainType,
            'brains' => Brain::all(),
        ]);

    }

    public function edit(BrainType $brainType)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'set_num' => 'nullable',
            'part_num' => 'required',
        ]);

        $brainType->update($attributes);

        return redirect('/brains/types/list')
            ->with('message', 'Brain Type has been edited!');

    }

    public function delete(BrainType $brainType)
    {
        
        Storage::delete($brainType->image);
        
        $brainType->delete();

        return redirect('/brains/types/list')
            ->with('message', 'Brain Type has been deleted!');                
        
    }

    public function imageForm(BrainType $brainType)
    {
        return view('brainTypes.image', [
            'brainType' => $brainType,
        ]);
    }

    public function image(BrainType $brainType)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($brainType->image);
        
        $path = request()->file('image')->store('brainType');

        $brainType->image = $path;
        $brainType->save();
        
        return redirect('/brains/types/list')
            ->with('message', 'Brain Type image has been edited!');
    }

    public function deleteImage(BrainType $brainType)
    {

        Storage::delete($brainType->image);

        $brainType->image = "";
        $brainType->save();

        return redirect('/brains/types/list')
            ->with('message', 'Brain Type image has been deleted!');

    }

}
