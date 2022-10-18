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
        'published_at',
    ];

    public function squares()
    {
        return $this->belongsToMany(MapSquare::class, 'building_square');
    }

}
