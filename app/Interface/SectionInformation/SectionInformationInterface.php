<?php


namespace App\Interface\SectionInformation;


use Illuminate\Http\Request;

 interface SectionInformationInterface
{
    public function create(array $request);

       public function update(array $request, int $id);

       public function findByResume(string $resume);



}
