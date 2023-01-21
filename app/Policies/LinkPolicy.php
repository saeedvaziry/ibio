<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    public function view(User|Admin $user, Link $link): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user->id === $link->user_id;
    }

    public function update(User|Admin $user, Link $link): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user->id === $link->user_id;
    }

    public function delete(User|Admin $user, Link $link): bool
    {
        if ($user instanceof Admin) {
            return true;
        }

        return $user->id === $link->user_id;
    }
}
