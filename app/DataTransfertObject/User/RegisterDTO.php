<?php

namespace App\DataTransfertObject\User;

use App\Enum\TypeUser\TypeUser;

class RegisterDTO
{
    public function __construct(
        private readonly  string $email,
        private readonly  string $type,
        private readonly  string $name,
        private readonly  string $password,
    )
    {

    }

    public function toArray():array
    {
        return [
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
            'type_type'=>TypeUser::from($this->type)->value,
        ];

    }
}
