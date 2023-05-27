<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CvRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $section =  $this->whenLoaded('section')["name"];
        $information = match($section){
            'Information de base' => $this->typeSection1(),
            "Experience"=> $this->typeSection2(),
            "Diplome"=> $this->typeSection3(),
            "Atout"=> $this->typeSection4(),
            "Competence Generale"=> $this->typeSection4(),
            "Centre d'interet"=> $this->typeSection4(),
            "Competence Informatique"=> $this->typeSection4(),
            "Langue"=> $this->typeSection4(),
            "Contenus libre"=> $this->typeSection4(),
            "Reseaux Sociaux"=> $this->typeSection4(),
            "Experience Associative"=> $this->typeSection2(),
            "Voyage"=> $this->typeSection4(),
        };
        return   $information;

    }

    private function typeSection1()
    {
        return [
            "id"=> $this->id,
            "user"=>$this->param1,
            "poste" => $this->param2,
           "accroche" => $this->param3,
           "email" => $this->param4,
           "telephone" => $this->param5,
           "ville_residence" => $this->param6,
           "ville_boulot" => $this->param7,
           "age" => $this->param8,
           "permis" => $this->param9,
           "vehicule" => $this->param10,
           "teletravail" => $this->param11,
           "handicaper" => $this->param12,
           "site_web" => $this->param113,
           "situation_familiale" => $this->param14,
           "nationalite" => $this->param15,
           "name" => $this->whenLoaded('section')["name"],

        ];

    }

    private function typeSection2()
    {

        return

        [
            "id"=> $this->id,
           "poste" => $this->param1,
           "debut" => $this->param2,
           "fin" => $this->param3,
           "entreprise" => $this->param4,
           "lieu" => $this->param5,
           "details" => $this->param6,
           "name" => $this->whenLoaded('section')["name"],
        ];
    }

    private function typeSection3()
    {
        return

         [
            "id"=> $this->id,
            "diplome" => $this->param1,
            "debut" => $this->param2,
            "fin" => $this->param3,
            "ecole" => $this->param4,
            "lieu" => $this->param5,
            "details" => $this->param6,
            "name" => $this->whenLoaded('section')["name"],
         ];

    }


    private function typeSection4()
    {
        return

         [
            "id"=> $this->id,
            "intutile" => $this->param1,
            "details" => $this->param2,
            "name" => $this->whenLoaded('section')["name"],
         ];

    }
}
