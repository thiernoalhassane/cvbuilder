<?php


namespace App\Services\ConsultantService;

use App\Enum\ResumeStatus\ResumeEnum;
use App\Interface\Consultant\ConsultantInterface;
use App\Interface\Resume\ResumeInterface;
use App\Models\consultant;
use App\Models\resume;
use Illuminate\Http\Request;

class ConsultantService implements ConsultantInterface
{

    public function create(resume $resume): consultant
    {
        $consultant = consultant::create(
            [
                'resume_id'=> $resume["id"],

            ]
        );
        return $consultant;
    }

}
