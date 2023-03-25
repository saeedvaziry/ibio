<?php

namespace App\Actions\Users;

use App\Enums\SocialLinksPosition;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UpdateSocialLinksPosition
{
    /**
     * @throws ValidationException
     */
    public function update(User $user, array $input): void
    {
        $validator = Validator::make($input, [
            'position' => [
                'required',
                Rule::in(SocialLinksPosition::getValues()),
            ],
        ]);
        $validator->validate();

        $user->social_links_position = SocialLinksPosition::fromValue($input['position']);
        $user->save();
    }
}
