<?php

namespace App\Actions\Auth;

use App\Enums\SocialLinksPosition;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

abstract class LoginWithOauth
{
    public function callback(): User
    {
        $data = Socialite::driver($this->driver)->user();
        /** @var User $user */
        $user = User::query()->firstOrNew([
            'email' => $data->getEmail()
        ]);
        $user->name = $data->getName();
        $user->password = 'not_set';
        $user->email_verified_at = now();
        $user->social_links_position = SocialLinksPosition::BOTTOM;

        $user->save();

        return $user;
    }
}
