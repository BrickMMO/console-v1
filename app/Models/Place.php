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
        'published_at',
    ];

    public function map()
    {
        return $this->belongsTo(Building::class);
    }
}
