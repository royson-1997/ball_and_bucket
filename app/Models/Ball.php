<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ball extends Model
{
    protected $fillable = ['color', 'size'];

    // Define a relationship with Bucket model
    public function bucket()
    {
        return $this->belongsTo(Bucket::class);
    }
}
