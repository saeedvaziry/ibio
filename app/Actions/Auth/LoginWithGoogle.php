<?php

namespace App\Actions\Auth;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogle extends LoginWithOauth
{
    protected string $driver = 'google';

    public function redirect(): RedirectResponse
    {
        return Socialite::driver($this->driver)->redirect();
    }
}
