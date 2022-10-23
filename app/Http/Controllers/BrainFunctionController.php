<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\BrainFunction;

class BrainFunctionController extends Controller
{
    public function list()
    {

        return view('brainFunctions.list', [
            'brainFunctions' => BrainFunction::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('brainFunctions.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        BrainFunction::create($attributes);

        return redirect('/brains/functions/list')
            ->with('message', 'Brain Function has been added!');

    }

    public function editForm(BrainFunction $brainFunction)
    {

        return view('brainFunctions.edit', [
            'brainFunction' => $brainFunction,
        ]);

    }

    public function edit(BrainFunction $brainFunction)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'set_num' => 'nullable',
            'part_num' => 'required',
        ]);

        $brainFunction->update($attributes);

        return redirect('/brains/functions/list')
            ->with('message', 'Brain Function has been edited!');

    }

    public function delete(BrainFunction $brainFunction)
    {
        
        Storage::delete($brainFunction->image);
        
        $brainFunction->delete();

        return redirect('/brains/functions/list')
            ->with('message', 'Brain Function has been deleted!');                
        
    }

}
