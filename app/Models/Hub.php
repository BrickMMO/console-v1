<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'set_num',
        'part_num',
        'image',
    ];

    public function brains()
    {
        return $this->hasMany(Brain::class);
    }

    public function ports()
    {
        return $this->hasMany(HubPort::class);
    }
    
}
