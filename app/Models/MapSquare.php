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

    public function map()
    {
        return $this->belongsTo(Tool::class, 'tool_type_id');
    }
}
