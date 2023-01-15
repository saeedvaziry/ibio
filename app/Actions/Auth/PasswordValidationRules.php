<?php

namespace App\Actions\Auth;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}
