<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapSquare extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'x',
        'y',
        'map_id',
    ];

    public function type()
    {
        return $this->belongsTo(MapType::class, 'type_id');
    }

    public function map()
    {
        return $this->belongsTo(Map::class, 'map_id');
    }

    public function buildings()
    {
        return $this->belongsToMany(Buildings::class, 'building_square');
    }
    
}
