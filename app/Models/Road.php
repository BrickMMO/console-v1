<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'map_id'
    ];

    public function squares()
    {
        return $this->hasMany(MapSquare::class);
    }

    public function map()
    {
        return $this->belongsTo(Map::class);
    }

    public function grid()
    {
        $map = Map::find($this->map_id);
        $grid = $map->grid();

        return $grid;
    }
    
}
