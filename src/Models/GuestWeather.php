<?php

namespace DfyTech\Weather\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestWeather extends Model
{
    use HasFactory;

    protected $table = 'guest_weathers';
    
    protected $guarded = [];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
