<?php

namespace App\Actions\Links;

use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateSort
{
    /**
     * @throws ValidationException
     */
    public function update(User $user, array $input): void
    {
        $validator = Validator::make($input, [
            'links.*.id' => [
                'required',
            ],
        ]);
        $validator->validate();

        foreach ($input['links'] as $key => $link) {
            /** @var Link $l */
            $l = Link::query()
                ->where('id', $link['id'])
                ->where('user_id', $user->id)
                ->firstOrFail();
            $l->sort = $key + 1;
            $l->save();
        }
    }
}
