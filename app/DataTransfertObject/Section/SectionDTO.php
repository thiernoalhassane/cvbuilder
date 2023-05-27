<?php

namespace App\DataTransfertObject\Section;

use App\Enum\TypeUser\TypeUser;

class SectionDTO
{
    public function __construct(
        private readonly  string $param1,
        private readonly  string $param2,
        private readonly  string|null $param3,
        private readonly  string|null $param4,
        private readonly  string|null $param5,
        private readonly  string|null $param6,
        private readonly  string|null $param7,
        private readonly  string|null $param8,
        private readonly  string|null $param9,
        private readonly  string|null $param10,
        private readonly  string|null $param11,
        private readonly  string|null $param12,
        private readonly  string|null $param13,
        private readonly  string|null $param14,
        private readonly  string|null $param15,
        private readonly string $section,
        private readonly string $resume
    )
    {

    }

    public function toArray():array
    {
        return [
            'param1'=>$this->param1,
            'param2'=>$this->param2,
            'param3'=>$this->param3,
            'param4'=>$this->param4,
            'param5'=>$this->param5,
            'param6'=>$this->param6,
            'param7'=>$this->param7,
            'param8'=>$this->param8,
            'param9'=>$this->param9,
            'param10'=>$this->param10,
            'param11'=>$this->param11,
            'param12'=>$this->param12,
            'param13'=>$this->param13,
            'param14'=>$this->param14,
            'param15'=>$this->param15,
            'section'=> $this->section,
            'resume'=> $this->resume
        ];
    }
}
