<?php

namespace App\Http\Controllers\Oauth;

use App\Actions\Auth\LoginWithGoogle;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirect(Request $request): RedirectResponse
    {
        if ($request->input('redirect')) {
            $request->session()->put('redirect', $request->input('redirect'));
        }

        return app(LoginWithGoogle::class)->redirect();
    }

    public function callback(): RedirectResponse
    {
        /** @var User $user */
        $user = app(LoginWithGoogle::class)->callback();

        auth()->login($user);

        return redirect()->route('links');
    }
}
