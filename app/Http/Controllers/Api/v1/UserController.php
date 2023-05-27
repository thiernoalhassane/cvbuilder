<?php

namespace App\Http\Controllers\Api\v1;

use App\DataTransfertObject\User\GetUserDTO;
use App\DataTransfertObject\User\LoginDTO;
use App\DataTransfertObject\User\RegisterDTO;
use App\DataTransfertObject\User\UpdateDTO;
use App\Enum\TypeUser\TypeUser;
use App\Http\Controllers\Api\v1\Resume\StoreControlller;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormUserRequest;
use App\Http\Resources\ConsultantRessource;
use App\Http\Resources\UserRessource;
use App\Models\consultant;
use App\Models\resume;
use App\Models\User;
use App\Services\AdministratorService\AdministratorService;
use App\Services\ConsultantService\ConsultantService;
use App\Services\ResumeService\ResumeService;
use App\Services\UserService\UserService;
use App\Traits\ApiResponser;
use App\Traits\UserRoles;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use ApiResponser;
    use UserRoles;

    public function __construct(
        private ConsultantService $consultantService,
        private AdministratorService $administratorService,
        private ResumeService $resumeService,
        private UserService $userService
    ) {
    }

    public function test(Request $request)
    {
        return $request->getRequestUri();
    }
    public function login(FormUserRequest $request)
    {
        $loginDTO = new LoginDTO(
            $request["email"],
            $request["password"],
        );
        $information = $loginDTO->toArray();
        return $this->userService->login($information);
    }

    public function logout(Request $request)
    {
        return $this->userService->logout($request);
    }

    /**
     * @LRDparam type string|max:32
     * @LRDparam responses 200
     *
   */

    public function listUser(FormUserRequest $request)
    {

        $getUserDTO = new GetUserDTO(
            $request["type"],
        );
        $information = $getUserDTO->toArray();
        $admin = $this->isAdmin($request->user());
        if ($admin) {
            return $this->userService->listUser($information);
        } else {
            return $this->errorResponse("you don't have sufficient rights",Response::HTTP_UNAUTHORIZED);
        }
    }

    public function countUser(FormUserRequest $request)
    {

        $getUserDTO = new GetUserDTO(
            $request["type"],
        );
        $information = $getUserDTO->toArray();
        $admin = $this->isAdmin($request->user());
        if ($admin) {
            return $this->userService->countUser($information);
        } else {
            return $this->errorResponse("you don't have sufficient rights",Response::HTTP_UNAUTHORIZED);
        }
    }
    public function store(FormUserRequest  $request)
    {
        $registerDTO = new RegisterDTO(
            $request["email"],
            $request["type"],
            $request["name"],
            $request["password"],
        );
        $information = $registerDTO->toArray();
        $response = match ($information["type_type"]) {
            TypeUser::Consultant->value => (new ConsultantController($this->consultantService, $this->resumeService, $this->userService))->store($information),
            TypeUser::Administrator->value => (new AdministratorController($this->administratorService, $this->userService))->store($information)
        };
        return $response;
    }

    public function update(FormUserRequest  $request)
    {
        $updateDTO = new UpdateDTO(
            $request["email"],
            $request["name"],
            $request["password"],
        );
        $information = $updateDTO->toArray();
        return $this->userService->update($information,$request->user()->id);
    }


}
