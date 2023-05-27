<?php

namespace App\DataTransfertObject\User;

use App\Enum\TypeUser\TypeUser;

class GetUserDTO
{
    public function __construct(
        private readonly  string $type,
    )
    {

    }

    public function toArray():array
    {
        return [
            'type'=>TypeUser::from($this->type)->value,
        ];

    }
}
