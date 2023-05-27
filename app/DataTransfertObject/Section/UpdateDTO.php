<?php

namespace App\DataTransfertObject\Section;

use App\Enum\TypeUser\TypeUser;

class UpdateDTO
{
    public function __construct(
        private readonly  string|null $param1,
        private readonly  string|null $param2,
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

    )
    {

    }

    public function toArray():array
    {
        $data = [];
        if ( !is_null($this->param1)) {
            $data['param1'] = $this->param1;
        }
        if ( !is_null($this->param2)) {
            $data['param2'] = $this->param2;
        }
        if ( !is_null($this->param3)) {
            $data['param3'] = $this->param3;
        }
        if ( !is_null($this->param4)) {
            $data['param4'] = $this->param4;
        }
        if ( !is_null($this->param5)) {
            $data['param5'] = $this->param5;
        }
        if ( !is_null($this->param6)) {
            $data['param6'] = $this->param6;
        }
        if ( !is_null($this->param7)) {
            $data['param7'] = $this->param7;
        }
        if ( !is_null($this->param8)) {
            $data['param8'] = $this->param8;
        }
        if ( !is_null($this->param9)) {
            $data['param9'] = $this->param9;
        }
        if ( !is_null($this->param10)) {
            $data['param10'] = $this->param10;
        }
        if ( !is_null($this->param11)) {
            $data['param11'] = $this->param11;
        }
        if ( !is_null($this->param12)) {
            $data['param12'] = $this->param12;
        }

        if ( !is_null($this->param13)) {
            $data['param13'] = $this->param13;
        }
        if ( !is_null($this->param14)) {
            $data['param14'] = $this->param14;
        }
        if ( !is_null($this->param15)) {
            $data['param15'] = $this->param15;
        }


        return $data;

    }
}
