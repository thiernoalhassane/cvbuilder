<?php

namespace App\Http\Controllers;

use App\DataTransfertObject\Resume\ResumeDTO;
use App\Http\Resources\CvCollection;
use App\Http\Resources\CvRessource;
use App\Services\ResumeService\ResumeService;
use App\Services\SectionInformationService\SectionInterfaceService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResumeController extends Controller
{
    use ApiResponser;
    /**
     * Handle the incoming request.
     */
    public function __construct(
        private ResumeService $resumeService,
        private SectionInterfaceService $sectionService,
    ) {
    }
    public function __invoke(Request $request)
    {
        $resumeDTO = new ResumeDTO(

            $request["resume"],
        );
        $information = $resumeDTO->toArray();

        $resume = $this->resumeService->getCv($information);


        $cv = $this->sectionService->findByResume($resume["id"]);

        return $this->successResponse(new CvCollection($cv),Response::$statusTexts[Response::HTTP_CREATED],Response::HTTP_CREATED);


    }
}
