<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Brain;
use App\Models\BrainType;
use App\Models\BrainPort;

class BrainPortController extends Controller
{
    public function list()
    {

        return view('brainPorts.list', [
            'brainPorts' => BrainPort::orderBy('brain_type_id', 'ASC')
                ->orderBy('title', 'ASC')->get()
        ]);

    }

    public function addForm()
    {

        return view('BrainPorts.add', [
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

        BrainPort::create($attributes);

        return redirect('/brains/ports/list')
            ->with('message', 'Brain Port has been added!');

    }

    public function editForm(BrainPort $brainPort)
    {

        return view('brainPorts.edit', [
            'brainPort' => $brainPort,
            'brains' => Brain::all(),
        ]);

    }

    public function edit(BrainPort $brainPort)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'set_num' => 'nullable',
            'part_num' => 'required',
        ]);

        $brainPort->update($attributes);

        return redirect('/brains/types/list')
            ->with('message', 'Brain has been edited!');

    }

    public function delete(BrainPort $brainPort)
    {
        
        Storage::delete($brainPort->image);
        
        $brainPort->delete();

        return redirect('/brains/types/list')
            ->with('message', 'Brain Type has been deleted!');                
        
    }

    public function imageForm(BrainPort $brainPort)
    {
        return view('brainPorts.image', [
            'brainPort' => $brainPort,
        ]);
    }

    public function image(BrainPort $brainPort)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($brainPort->image);
        
        $path = request()->file('image')->store('brainPort');

        $brainPort->image = $path;
        $brainPort->save();
        
        return redirect('/brains/types/list')
            ->with('message', 'Brain Type image has been edited!');
    }

    public function deleteImage(BrainPort $brainPort)
    {

        Storage::delete($brainPort->image);

        $brainPort->image = "";
        $brainPort->save();

        return redirect('/brains/types/list')
            ->with('message', 'Brain Type image has been deleted!');

    }

}
