<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UpdatePublicFields
{
    /**
     * @throws ValidationException
     */
    public function update(User $user, $field, array $input): void
    {
        if (! isset($this->rules($user)[$field])) {
            throw ValidationException::withMessages([$field => "Doesn't exist!"]);
        }

        $validator = Validator::make($input, [$field => $this->rules($user)[$field]]);
        $validator->validate();

        $user->{$field} = $input[$field];
        $user->save();
    }

    protected function rules(User $user): array
    {
        return [
            'username' => [
                'required',
                Rule::unique('users', 'username')->whereNot('id', $user->id),
                'alpha_num:ascii',
                'min:5',
            ],
            'name' => [
                'required',
                'max:255',
            ],
            'bio' => [
                'max:1000',
            ],
        ];
    }
}
