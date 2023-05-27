<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sectionInformation extends Model
{
    use HasFactory;

    protected $fillable = [
                'param1',
                'param2' ,
                'param3',
                'param4' ,
                'param5',
                'param6' ,
                'param7',
                'param8' ,
                'param9',
                'param10' ,
                'param11',
                'param12' ,
                'param13',
                'param14' ,
                'param15',
                'resume_id',
                'section_id',
    ];
    public function resume():BelongsTo
    {
        return $this->belongsTo(resume::class);
    }

    public function section():BelongsTo
    {
        return $this->belongsTo(section::class);
    }
}
