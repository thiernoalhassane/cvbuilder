<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'numberCv',
        'status'
    ];


    public function consultant(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function sectionInformation():HasMany
    {
        return $this->hasMany(sectionInformation::class);
    }
}
