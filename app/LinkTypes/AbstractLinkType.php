<?php

namespace App\LinkTypes;

use App\Models\Link;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class AbstractLinkType implements LinkTypeInterface
{
    protected Link $link;

    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * @throws ValidationException
     */
    public function updateData(array $input, $field): Link
    {
        $this->validate($input, $field);

        $data = $this->link->data;
        $data[$field] = $input[$field];
        $this->link->data = $data;
        if (
            $field === 'url' &&
            ! $this->link->thumbnail_set_from_url &&
            ! $this->link->thumbnail &&
            (
                $this instanceof Video ||
                $this instanceof Music
            )
        ) {
            $this->link->updateThumbnailFromUrl($input[$field]);
        }

        $this->link->save();

        return $this->link;
    }

    public function isDataValid(): bool
    {
        $validator = Validator::make($this->link->data, $this->rules());

        return ! $validator->fails();
    }

    /**
     * @throws ValidationException
     */
    private function validate(array $input, $field): void
    {
        if (! isset($this->rules()[$field])) {
            throw ValidationException::withMessages([$field => "Doesn't exist!"]);
        }

        $validator = Validator::make($input, [$field => $this->rules()[$field]]);
        $validator->validate();
    }
}
