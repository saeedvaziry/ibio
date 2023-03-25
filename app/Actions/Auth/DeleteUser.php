<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeleteUser
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     */
    public function delete(User $user): void
    {
        DB::transaction(function () use ($user) {
            $user->delete();
        });
    }
}
