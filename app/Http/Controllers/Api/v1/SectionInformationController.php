<?php

namespace App\Http\Controllers\Api\v1;

use App\DataTransfertObject\Section\SectionDTO;
use App\DataTransfertObject\Section\UpdateDTO;
use App\Http\Controllers\Controller;

use App\Services\SectionInformationService\SectionInterfaceService;

use App\Traits\ApiResponser;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SectionInformationController extends Controller
{
    use ApiResponser;

    public function __construct(
        private SectionInterfaceService $sectionService,

    ) {
    }

    // create an sectionInformation

    public function test(Request $request)
    {
        return $request->getRequestUri();
    }


    public function store(Request  $request)
    {
        $registerDTO = new SectionDTO(
            $request["param1"],
            $request["param2"],
            $request["param3"],
            $request["param4"],
            $request["param5"],
            $request["param6"],
            $request["param7"],
            $request["param8"],
            $request["param9"],
            $request["param10"],
            $request["param11"],
            $request["param12"],
            $request["param13"],
            $request["param14"],
            $request["param15"],
            $request["section"],
            $request["resume"],
        );
        $information = $registerDTO->toArray();
        $section = $this->sectionService->create($information);
        return  $section;

    }

    public function update(Request  $request)
    {

        $updateDTO = new UpdateDTO(
            $request["param1"],
            $request["param2"],
            $request["param3"],
            $request["param4"],
            $request["param5"],
            $request["param6"],
            $request["param7"],
            $request["param8"],
            $request["param9"],
            $request["param10"],
            $request["param11"],
            $request["param12"],
            $request["param13"],
            $request["param14"],
            $request["param15"],
        );
        $information = $updateDTO->toArray();
        return $this->sectionService->update($information,$request["id"]);

    }


}
