<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Brain;
use App\Models\BrainPort;
use App\Models\Hub;
use App\Models\HubFunction  ;
use App\Models\HubPort;
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
            'ip' => 'nullable',
            'map_id' => 'required',
            'hub_id' => 'required',
        ]);

        $brain = Brain::create($attributes);

        $hub = Hub::find($brain->hub_id);

        foreach($hub->hubPorts as $key => $value)
        {
            $brainPort = new BrainPort();
            $brainPort->brain_id = $brain->id;
            $brainPort->hub_port_id = $value->id;
            $brainPort->save();
        }

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
            'ip' => 'nullable',
            'map_id' => 'required',
            'hub_id' => 'required',
        ]);

        if($brain->hub_id != $attributes['hub_id'])
        {

            BrainPort::where('brain_id', $brain->id)->delete();

            $hub = Hub::find($attributes['hub_id']);

            foreach($hub->hubPorts as $key => $value)
            {
                $brainPort = new BrainPort();
                $brainPort->brain_id = $brain->id;
                $brainPort->hub_port_id = $value->id;
                $brainPort->save();
            }
                
        }

        $brain->update($attributes);

        return redirect('/brains/list')
            ->with('message', 'Brain has been edited!');

    }

    public function delete(Brain $brain)
    {
        
        Storage::delete($brain->image);

        BrainPort::where('brain_id', $brain->id)->delete();
        
        $brain->delete();

        return redirect('/brains/list')
            ->with('message', 'Brain has been deleted!');                
        
    }

    public function portsForm(Brain $brain)
    {

        $ports = BrainPort::where('brain_id', $brain->id)->orderBy('id')->get();
        $functions = HubFunction::orderBy('title')->get();

        return view('brains.ports', [
            'brain' => $brain,
            'brainPorts' => $ports,
            'functions' => $functions,
        ]);

    }

    public function ports(Brain $brain, Request $request)
    {

        foreach($request->function_id as $key => $value)
        {
            $brainPort = BrainPort::find($key);
            $brainPort->hub_function_id = $value;
            $brainPort->save();
        }

        return redirect('/brains/list')
            ->with('message', 'Brain has been edited!');

    }

    public function jsonForm(Brain $brain)
    {

        $ports = BrainPort::where('brain_id', $brain->id)->orderBy('id')->get();

        return view('brains.json', [
            'brain' => $brain,
            'brainPorts' => $ports,
        ]);

    }

    public function json(Brain $brain, Request $request)
    {

        foreach($request->json as $key => $value)
        {
            $brainPort = BrainPort::find($key);
            $brainPort->json = $value;
            $brainPort->save();
        }

        return redirect('/brains/list')
            ->with('message', 'Brain has been edited!');

    }

    public function settingsForm(Brain $brain)
    {

        $ports = BrainPort::where('brain_id', $brain->id)->orderBy('id')->get();

        return view('brains.settings', [
            'brain' => $brain,
            'brainPorts' => $ports,
        ]);

    }

    public function settings(Brain $brain, Request $request)
    {

        foreach($request->settings as $key => $value)
        {
            $brainPort = BrainPort::find($key);
            $brainPort->settings = $value;
            $brainPort->save();
        }

        return redirect('/brains/list')
            ->with('message', 'Brain has been edited!');

    }

}
