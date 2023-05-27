<?php


namespace App\Interface\User;

use App\Models\User;
use Illuminate\Http\Request;

 interface UserInterface
{
    public function login(array  $request);

    public function create(array  $request , array $user);

    public function logout(Request  $request);

    public function listUser(array $request );

    public function countUser(array $request );

    public function update(array $request, int $id);

    public function verifyEmail(string $email);

    public function recoveryPassword(array  $request , string $email);

   // public function delete();
}
