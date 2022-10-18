<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ArticleType;

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
        return $this->hasMany(MapSquares::class, 'map_id');
    }

}
