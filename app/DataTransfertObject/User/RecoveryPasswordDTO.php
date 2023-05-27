<?php

namespace App\DataTransfertObject\User;

use App\Enum\TypeUser\TypeUser;

class RecoveryPasswordDTO
{
    public function __construct(
        private readonly  string $password,
    )
    {

    }

    public function toArray():array
    {

        return [

            'password' => ($this->password)
        ];

    }
}
