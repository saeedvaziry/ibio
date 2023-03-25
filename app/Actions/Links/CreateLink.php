<?php

namespace App\Actions\Links;

use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreateLink
{
    public function create(User $user): Link
    {
        $this->validate(request()->input());

        /** @var Link $firstLink */
        $firstLink = $user->links()
            ->whereIn('type', config('links.types_when_creating'))
            ->orderByDesc('sort')
            ->first();
        $link = new Link();
        $link->user_id = $user->id;
        $link->type = request()->input('type');
        $link->data = $link->type()->fields();
        $link->sort = $firstLink ? $firstLink->sort + 1 : 1;
        $link->save();

        return $link;
    }

    protected function validate(array $input)
    {
        Validator::validate($input, [
            'type' => [
                'required',
                Rule::in(config('links.types_when_creating')),
            ],
        ]);
    }
}
