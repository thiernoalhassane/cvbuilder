<?php

namespace App\Http\Controllers\Api\v1\Resume;

use App\Http\Controllers\Controller;
use App\Services\ResumeService\ResumeService;
use Illuminate\Http\Request;

class StoreControlller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store()
    {
        $resume =  (new ResumeService())->create();
        return $resume;
    }
}
