<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'set_num',
        'color',
        'map_id',
        'image',
        'published_at',
    ];

    public function squares()
    {
        return $this->hasMany(MapSquare::class);
    }

    public function map()
    {
        return $this->belongsTo(Map::class);
    }

}
