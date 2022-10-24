<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrainPort extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'json',
        'settings',
        'brain_id',
        'hub_port_id',
        'hub_function_id',
    ];

    public function hubPort()
    {
        return $this->belongsTo(HubPort::class);
    }

    public function hubFunction()
    {
        return $this->belongsTo(HubFunction::class);
    }

    public function brain()
    {
        return $this->belongsTo(Brain::class);
    }

}
