<?php


namespace App\Services\SectionInformationService;

use App\Enum\ResumeStatus\ResumeEnum;
use App\Interface\Resume\ResumeInterface;
use App\Interface\SectionInformation\SectionInformationInterface;
use App\Models\resume;
use App\Models\section;
use App\Models\sectionInformation;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SectionInterfaceService implements SectionInformationInterface
{
    use ApiResponser;

    public function create(array $request)
    {

        $section = section::where("name",$request["section"])->first();
        $resume = resume::where("numberCv",$request["resume"])->first();

        $sectionInformation = sectionInformation::create(
            [
                'param1'=> $request["param1"],
                'param2' =>$request["param2"],
                'param3'=> $request["param3"],
                'param4' =>$request["param4"],
                'param5'=> $request["param5"],
                'param6' =>$request["param6"],
                'param7'=> $request["param7"],
                'param8' =>$request["param8"],
                'param9'=> $request["param9"],
                'param10' =>$request["param10"],
                'param11'=> $request["param11"],
                'param12' =>$request["param12"],
                'param13'=> $request["param13"],
                'param14' =>$request["param14"],
                'param15' =>$request["param15"],
                'resume_id'=>$resume["id"],
                'section_id'=>$section["id"],
            ]
        );
       // return $sectionInformation;
       return $this->successResponse("ok",Response::$statusTexts[Response::HTTP_CREATED],Response::HTTP_CREATED);
    }


    public function update(array $request, int $id)
    {
        sectionInformation::find($id)->update($request);
       $section = sectionInformation::find($id);
       return $this->successResponse("updated",Response::$statusTexts[Response::HTTP_OK],Response::HTTP_OK);

    }

    public function findByResume(string $resume)
    {
            $section = sectionInformation::with('section')->where("resume_id",$resume)->get();
            return $section;
    }
}
