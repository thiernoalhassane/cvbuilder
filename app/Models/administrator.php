<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrator extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function userMother()
    {
        return $this->morphOne('App\Models\User','userType');
    }
}
