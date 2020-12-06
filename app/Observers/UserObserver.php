<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    /**
     * @param User $user
     */
    public function created(User $user)
    {
        $user->bio = 'Hi there 👋';
        $user->save();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     * @throws \Exception
     */
    public function deleted(User $user)
    {
        $user->links()->delete();
        $user->stats()->forceDelete();
        $user->update([
            'email' => time() . '::' . $user->email,
            'username' => time() . '::' . $user->username,
        ]);
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
    }
}
