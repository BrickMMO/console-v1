<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\HubFunction;

class HubFunctionController extends Controller
{
    public function list()
    {

        return view('hubFunctions.list', [
            'hubFunctions' => HubFunction::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('hubFunctions.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        HubFunction::create($attributes);

        return redirect('/hubs/functions/list')
            ->with('message', 'Function has been added!');

    }

    public function editForm(HubFunction $hubFunction)
    {

        return view('hubFunctions.edit', [
            'hubFunction' => $hubFunction,
        ]);

    }

    public function edit(HubFunction $hubFunction)
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $hubFunction->update($attributes);

        return redirect('/hubs/functions/list')
            ->with('message', 'Function has been edited!');

    }

    public function delete(HubFunction $hubFunction)
    {
        
        $hubFunction->delete();

        return redirect('/hubs/functions/list')
            ->with('message', 'Function has been deleted!');                
        
    }

}
