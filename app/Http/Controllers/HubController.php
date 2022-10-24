<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Brain;
use App\Models\Hub;
use App\Models\HubPort;

class HubController extends Controller
{
    public function list()
    {

        return view('hubs.list', [
            'hubs' => Hub::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('hubs.add', [
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

        Hub::create($attributes);

        return redirect('/brains/hubs/list')
            ->with('message', 'Hub has been added!');

    }

    public function editForm(Hub $hub)
    {

        return view('hubs.edit', [
            'hub' => $hub,
            'brains' => Brain::all(),
        ]);

    }

    public function edit(Hub $hub)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'set_num' => 'nullable',
            'part_num' => 'required',
        ]);

        $hub->update($attributes);

        return redirect('/brains/hubs/list')
            ->with('message', 'Hub has been edited!');

    }

    public function delete(Hub $hub)
    {
        
        Storage::delete($hub->image);
        
        $hub->delete();

        return redirect('/brains/hubs/list')
            ->with('message', 'Hub has been deleted!');                
        
    }

    public function imageForm(Hub $hub)
    {
        return view('hubs.image', [
            'hub' => $hub,
        ]);
    }

    public function image(Hub $hub)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($hub->image);
        
        $path = request()->file('image')->store('hubs');

        $hub->image = $path;
        $hub->save();
        
        return redirect('/brains/hubs/list')
            ->with('message', 'Hub image has been edited!');
    }

    public function deleteImage(Hub $hub)
    {

        Storage::delete($hub->image);

        $hub->image = "";
        $hub->save();

        return redirect('/brains/hubs/list')
            ->with('message', 'Hub image has been deleted!');

    }

}
