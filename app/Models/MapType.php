<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapType extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function squares()
    {
        return $this->hasMany(MapSquares::class, 'type_id');
    }
    
}
