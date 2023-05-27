<?php

namespace App\DataTransfertObject\User;

use App\Enum\TypeUser\TypeUser;

class UpdateDTO
{
    public function __construct(
        private readonly  string|null $email,
        private readonly  string|null $name,
        private readonly  string|null $password,
    )
    {

    }

    public function toArray():array
    {
        $data = [];
        if ( !is_null($this->name)) {
            $data['name'] = $this->name;
        }

        if (!is_null($this->email)) {
            $data['email'] = $this->email;
        }


        if (!is_null($this->password)) {
            $data['password'] = bcrypt($this->password) ;
        }
        return $data;

    }
}
