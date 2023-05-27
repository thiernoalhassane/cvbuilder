<?php

namespace App\Http\Controllers\Api\v1;

use App\DataTransfertObject\User\RegisterDTO;
use App\Enum\TypeUser\TypeUser;
use App\Http\Controllers\Api\v1\Resume\StoreControlller;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginRessource;
use App\Http\Resources\UserRessource;
use App\Models\User;
use App\Services\ConsultantService\ConsultantService;
use App\Services\ResumeService\ResumeService;
use App\Services\UserService\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConsultantController extends Controller
{

    public function __construct(
        private ConsultantService $consultantService,
        private ResumeService $resumeService,
        private UserService $userService
    )
    {}
    public function login()
    {
        return response()->json(new LoginRessource(User::all()) , Response::HTTP_OK) ;
    }

    public function store(array $request)
    {

        $resume = $this->resumeService->create();
        $consultant = $this->consultantService->create($resume);
        $arrayConsultant = [
                "id"=>$consultant->id,
                "type"=>TypeUser::Consultant,
        ];
        $this->userService->create($request,   $arrayConsultant);

        return $this->userService->login($request);

    }
}
