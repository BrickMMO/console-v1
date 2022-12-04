<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'x',
        'y',
        'width',
        'height',
        'building_id',
        'road_id',
        'published_at',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function road()
    {
        return $this->belongsTo(Road::class);
    }

    public function grid()
    {
        $building = Building::find($this->building_id);
        
        $grid = array();

        for($x = 1; $x <= $building->width * 16; $x ++)
        {
            for($y = 1; $y <= $building->height * 16; $y ++)
            {
                if(
                    $x >= $this->x and 
                    $x < $this->x + $this->width and 
                    $y >= $this->y and 
                    $y < $this->y + $this->height)
                {
                    $grid[$y][$x] = 'red';
                }
                else
                {
                    $grid[$y][$x] = 'grey';
                }
            }
        }

        return $grid;
    }
}
