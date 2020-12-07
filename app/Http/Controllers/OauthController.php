<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;

class OauthController
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        $data = Socialite::driver($provider)->user();
        $user = User::query()->where('email', $data->getEmail())->first();
        if ($user) {
            if (!$user->email_verified_at) {
                $user->update($user->id, [
                    'email_verified_at' => Carbon::now()
                ]);
            }
        } else {
            $user = User::query()->create([
                'name' => $data->getName(),
                'email' => $data->getEmail(),
                'password' => 'not_set',
                'email_verified_at' => now()
            ]);
        }

        auth()->login($user);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
