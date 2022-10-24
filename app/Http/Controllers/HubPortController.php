<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Brain;
use App\Models\Hub;
use App\Models\HubPort;

class HubPortController extends Controller
{
    public function list()
    {

        return view('hubPorts.list', [
            'hubPorts' => HubPort::orderBy('hub_id', 'ASC')
                ->orderBy('title', 'ASC')->get()
        ]);

    }

    public function addForm()
    {

        return view('HubPorts.add', [
            'functions' => array('Input', 'Output', 'Input/Output'),
            'hubs' => Hub::all(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'function' => 'required',
            'hub_id' => 'required',
        ]);

        HubPort::create($attributes);

        return redirect('/hubs/ports/list')
            ->with('message', 'Port has been added!');

    }

    public function editForm(HubPort $hubPort)
    {

        return view('hubPorts.edit', [
            'hubPort' => $hubPort,
            'functions' => array('Input', 'Output', 'Input/Output'),
            'hubs' => Hub::all(),
        ]);

    }

    public function edit(HubPort $hubPort)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'function' => 'required',
            'hub_id' => 'required',
        ]);

        $hubPort->update($attributes);

        return redirect('/hubs/ports/list')
            ->with('message', 'Port has been edited!');

    }

    public function delete(HubPort $hubPort)
    {
        
        $hubPort->delete();

        return redirect('/hubs/ports/list')
            ->with('message', 'Port has been deleted!');                
        
    }

}
