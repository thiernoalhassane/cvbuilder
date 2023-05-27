<?php

namespace App\DataTransfertObject\User;

use App\Enum\TypeUser\TypeUser;

class LoginDTO
{
    public function __construct(
        private readonly  string $email,
        private readonly  string $password,
    )
    {

    }

    public function toArray():array
    {
        return [
            'email'=>$this->email,
            'password'=>$this->password,

        ];

    }
}
