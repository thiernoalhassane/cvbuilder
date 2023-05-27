<?php

namespace App\DataTransfertObject\Resume;

use App\Enum\TypeUser\TypeUser;

class ResumeDTO
{
    public function __construct(

        private readonly string $resume
    )
    {

    }

    public function toArray():array
    {
        return [
            'resume'=> $this->resume
        ];
    }
}
