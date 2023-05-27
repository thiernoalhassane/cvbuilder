<?php

namespace App\Http\Controllers\Api\v1;

use App\DataTransfertObject\User\RegisterDTO;
use App\Enum\TypeUser\TypeUser;
use App\Http\Controllers\Api\v1\Resume\StoreControlller;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginRessource;
use App\Http\Resources\UserRessource;
use App\Models\User;
use App\Services\AdministratorService\AdministratorService;
use App\Services\ConsultantService\ConsultantService;
use App\Services\ResumeService\ResumeService;
use App\Services\UserService\UserService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdministratorController extends Controller
{
    use ApiResponser;

    public function __construct(
        private AdministratorService $administratorService,
        private UserService $userService
    )
    {}

    public function store(array $request)
    {
        $administrator = $this->administratorService->create();
        $arrayAdministrator = [
                "id"=>$administrator->id,
                "type"=>TypeUser::Administrator,
        ];
        $user = $this->userService->create($request,   $arrayAdministrator);
        return $this->successResponse(new LoginRessource($user),Response::$statusTexts[Response::HTTP_CREATED],Response::HTTP_CREATED);

    }
}
