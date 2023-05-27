<?php

namespace App\Http\Controllers;

use App\DataTransfertObject\User\RecoveryPasswordDTO;
use App\Http\Requests\FormUserRequest;
use App\Services\UserService\UserService;
use Illuminate\Http\Request;

class RecoveryPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */

     public function __construct(
        private UserService $userService
    ) {
    }
    public function __invoke(FormUserRequest $request)
    {
        $recoveryDTO = new RecoveryPasswordDTO(

            $request["password"],
        );
        $information = $recoveryDTO->toArray();
        return $this->userService->recoveryPassword($information, $request["email"]);
    }
}
