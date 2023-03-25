<?php

namespace App\Providers;

use App\Actions\Auth\CreateNewUser;
use App\Actions\Auth\ResetUserPassword;
use App\Actions\Auth\UpdateUserPassword;
use App\Actions\Auth\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->input('email');

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function () {
            return inertia('Auth/Login');
        });

        Fortify::registerView(function () {
            return inertia('Auth/Register');
        });

        Fortify::verifyEmailView(function () {
            return inertia('Auth/VerifyEmail');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return inertia('Auth/ForgotPassword');
        });

        Fortify::resetPasswordView(function (Request $request) {
            return inertia('Auth/ResetPassword', [
                'token' => $request->route('token'),
                'email' => $request->query('email'),
            ]);
        });

        Fortify::confirmPasswordView(function () {
            return inertia('Auth/ConfirmPassword');
        });

        Fortify::twoFactorChallengeView(function () {
            return inertia('Auth/TwoFactorChallenge');
        });
    }
}
