<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Building;
use App\Models\Brain;
use App\Models\Map;
use App\Models\MapSquare;
use App\Models\MapType;


class MapController extends Controller
{

    public function list()
    {

        return view('maps.list', [
            'maps' => Map::orderBy('title', 'DESC')->get()
        ]);

    }

    public function addForm()
    {

        return view('maps.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'width' => 'required|numeric|max:24',
            'height' => 'required|numeric:posts|max:24',
        ]);

        $map = new Map();
        $map->title = $attributes['title'];
        $map->width = $attributes['width'];
        $map->height = $attributes['height'];
        $map->save();

        $id = $map->id;

        for($i = 0; $i < $map->width; $i ++)
        {
            for($j = 0; $j < $map->height; $j ++)
            {
                $square = new MapSquare();
                $square->x = $i;
                $square->y = $j;
                $square->map_type_id = 1;
                $square->map_id = $id;
                $square->save();
            }
        }

        return redirect('/maps/list')
            ->with('message', 'Map has been added!');

    }

    public function editForm(Map $map)
    {

        return view('maps.edit', [
            'map' => $map,
        ]);

    }

    public function edit(Map $map)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'width' => 'required|numeric|max:24',
            'height' => 'required|numeric:posts|max:24',
        ]);

        $map->title = $attributes['title'];
        $map->width = $attributes['width'];
        $map->height = $attributes['height'];
        $map->save();

        $id = $map->id;

        MapSquare::where('map_id', '=', $id)
            ->where('x', '>=', $map->width)
            ->delete();

        MapSquare::where('map_id', '=', $id)
            ->where('y', '>=', $map->height)
            ->delete();

        for($i = 0; $i < $map->width; $i ++)
        {
            for($j = 0; $j < $map->height; $j ++)
            {

                $square = MapSquare::where('map_id', '=', $id)
                    ->where('x', '=', $i)
                    ->where('y', '=', $j)
                    ->count();

                if($square == 0)
                {
                    $square = new MapSquare();
                    $square->x = $i;
                    $square->y = $j;
                    $square->map_type_id = 1;
                    $square->map_id = $id;
                    $square->save();
                }

            }
        }

        return redirect('/maps/list')
            ->with('message', 'Map has been edited!');

    }

    public function delete(Map $map)
    {

        MapSquare::where('map_id', $map->id)->delete();
        Building::where('map_id', $map->id)->delete();
        Brain::where('map_id', $map->id)->delete();

        $map->delete();

        return redirect('/maps/list')
            ->with('message', 'Map has been deleted!');                
        
    }

    public function typesForm(Map $map)
    {

        return view('maps.types', [
            'map' => $map,
            'types' => MapType::all(),
        ]);

    }

    public function types(Map $map, Request $request)
    {

        $rows = $request->input('square');

        foreach($rows as $x => $row)
        {
            foreach($row as $y => $col)
            {
                $mapSquare = MapSquare::where('map_id', $map->id)
                    ->where('x', $x)
                    ->where('y', $y)
                    ->first();
                $mapSquare->map_type_id = $col;
                $mapSquare->save();
            }

        }

        return redirect('/maps/list')
            ->with('message', 'Map has been edited!');      

    }
    
}
