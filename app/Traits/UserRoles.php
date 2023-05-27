<?php

namespace App\Traits;

use App\Enum\TypeUser\TypeUser;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait UserRoles
{

    protected function isAdmin(User $user): bool
    {
        if ($user->type_type == TypeUser::Administrator->value) {
            return true;
        }
        return false;
    }
}
