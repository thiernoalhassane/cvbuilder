<?php


namespace App\Services\ResumeService;

use App\Enum\ResumeStatus\ResumeEnum;
use App\Http\Resources\CountCvRessource;
use App\Interface\Resume\ResumeInterface;
use App\Models\resume;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResumeService implements ResumeInterface
{

    use ApiResponser;
    public function create(): resume
    {
        $resume = resume::create(
            [
                'numberCv'=> rand(00000000,999999999),
                'status' => ResumeEnum::U
            ]
        );
        return $resume;
    }

    public function getCv(array $request)
    {
        $resume = resume::where('numberCv', $request['resume'])->first();
        return $resume;

    }

    public function countCv(array $request)
    {

        $result = resume::where('status', $request["status"])->count();

        $cv = [
            "count"=>$result,
            "status"=>$request["status"],
        ];

        return $this->successResponse(new CountCvRessource( $cv), "Total de CV ".$request["status"] ,Response::HTTP_OK);
    }

}
