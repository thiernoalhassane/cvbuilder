<?php


namespace App\Services\AdministratorService;

use App\Enum\ResumeStatus\ResumeEnum;
use App\Interface\Administrator\AdministratorInterface;
use App\Interface\Consultant\ConsultantInterface;
use App\Interface\Resume\ResumeInterface;
use App\Models\administrator;
use App\Models\consultant;
use App\Models\resume;
use Illuminate\Http\Request;

class AdministratorService implements AdministratorInterface
{

    public function create(): administrator
    {
        $admin = administrator::create(

        );
        return $admin;
    }

}
