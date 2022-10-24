<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubPort extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'function',
        'hub_id',
    ];

    public function hub()
    {
        return $this->belongsTo(Hub::class);
    }
    
}
