<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class consultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
    ];

    public function userMother():MorphOne
    {
        return $this->morphOne('App\Models\User','userType');
    }

    public function resume():BelongsTo
    {
        return $this->BelongsTo(resume::class);
    }
}
