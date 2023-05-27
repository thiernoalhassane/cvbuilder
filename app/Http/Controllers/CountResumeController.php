<?php

namespace App\Http\Controllers;

use App\DataTransfertObject\Resume\GetStatusDTO;
use App\Services\ResumeService\ResumeService;
use App\Traits\ApiResponser;
use App\Traits\UserRoles;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountResumeController extends Controller
{
    use UserRoles;
    use ApiResponser;

    public function __construct(
         private ResumeService $resumeService
    )

    {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $getStatusDTO = new GetStatusDTO(
            $request["status"],
        );
        $information = $getStatusDTO->toArray();
        $admin = $this->isAdmin($request->user());
        if ($admin) {
            return $this->resumeService->countCv($information);
        } else {
            return $this->errorResponse("you don't have sufficient rights",Response::HTTP_UNAUTHORIZED);
        }
    }
}
