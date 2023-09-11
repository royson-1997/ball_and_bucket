<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    protected $fillable = ['name', 'capacity', 'empty_volume'];

    // Define a relationship with Ball model
    public function balls()
    {
        return $this->hasMany(Ball::class);
    }
}
