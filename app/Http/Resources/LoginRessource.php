<?php

namespace App\Http\Resources;

use App\Models\consultant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'email' => $this->email,
            'name'=> $this->name,
            'password'=> $this->password,
            'type_user'=> $this->type_type,
            'type_id'=>  $this->type_id,
            'token' => $this->createToken(uniqid())->plainTextToken,
            $this->mergeWhen($this->type_type == "consultant", [
                'resume' =>new ConsultantRessource(consultant::with('resume')->where('id',$this->type_id)->first()),

            ]),
        ];
    }
}
