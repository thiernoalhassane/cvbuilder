<?php


namespace App\Interface\Resume;


use Illuminate\Http\Request;

 interface ResumeInterface
{
   // public function login();

   // public function logout();

    public function create();

    public function getCv(array $request);

    public function countCv(array $request );

   // public function update();

   // public function delete();
}
