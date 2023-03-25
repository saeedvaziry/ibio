<?php

namespace App\Actions\Auth;

use App\Enums\SocialLinksPosition;
use App\Models\Theme;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

abstract class LoginWithOauth
{
    public function callback(): User
    {
        $data = Socialite::driver($this->driver)->user();
        /** @var User $user */
        $user = User::query()->firstOrNew([
            'email' => $data->getEmail(),
        ]);
        if (! $user->name) {
            $user->name = $data->getName();
        }
        if (! $user->password) {
            $user->password = 'not_set';
        }
        if (! $user->email_verified_at) {
            $user->email_verified_at = now();
        }
        if (! $user->social_links_position) {
            $user->social_links_position = SocialLinksPosition::BOTTOM;
        }
        if (! $user->theme_id) {
            $user->theme_id = Theme::query()->first()->id;
        }

        $user->save();

        return $user;
    }
}
