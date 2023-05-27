<?php


namespace App\Interface\Consultant;

use App\Models\resume;
use Illuminate\Http\Request;

 interface ConsultantInterface
{
   // public function login();

   // public function logout();

    public function create(resume $resume);

   // public function update();

   // public function delete();
}
