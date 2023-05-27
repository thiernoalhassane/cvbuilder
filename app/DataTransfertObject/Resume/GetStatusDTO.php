<?php

namespace App\DataTransfertObject\Resume;

use App\Enum\ResumeStatus\ResumeEnum;
use App\Enum\TypeUser\TypeUser;

class GetStatusDTO
{
    public function __construct(

        private readonly string $status
    )
    {

    }

    public function toArray():array
    {
        return [
            'status'=>ResumeEnum::from($this->status)->value,
        ];
    }
}
