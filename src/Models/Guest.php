<?php

namespace Dfytech\Weather\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function weathers()
    {
        return $this->hasMany(GuestWeather::class);
    }

}
