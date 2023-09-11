<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = ['bucket_id', 'ball_id'];

    // Define a relationship with Bucket model
    public function bucket()
    {
        return $this->hasMany(Bucket::class);
    }

    // Define a relationship with Ball model
    public function ball()
    {
        return $this->hasMany(Ball::class);
    }
    
}
