<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormUserRequest;
use App\Models\User;
use App\Services\UserService\UserService;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
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
          return $this->userService->verifyEmail($request["email"]);
    }
}
