<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrainPort extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function type()
    {
        return $this->belongsTo(BrainType::class);
    }
    
}
