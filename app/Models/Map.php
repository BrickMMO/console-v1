<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'title',
        'width',
        'height',
        'published_at',
    ];

    public function squares()
    {
        return $this->hasMany(MapSquare::class, 'map_id');
    }

    public function buildings()
    {
        return $this->hasMany(Building::class, 'map_id');
    }

    public function brains()
    {
        return $this->hasMany(Brain::class, 'map_id');
    }

}
