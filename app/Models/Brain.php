<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brain extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'map_id',
        'brain_type_id',
        'published_at',
    ];

    public function hub()
    {
        return $this->belongsTo(Hub::class);
    }

    public function map()
    {
        return $this->belongsTo(Map::class);
    }

}
