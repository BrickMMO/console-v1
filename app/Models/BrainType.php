<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrainType extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function brains()
    {
        return $this->hasMany(Brain::class);
    }
    
}
