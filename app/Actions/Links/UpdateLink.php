<?php

namespace App\Actions\Links;

use App\Models\Link;

class UpdateLink
{
    public function update(Link $link, array $input): Link
    {
        if (isset($input['is_active'])) {
            $link->is_active = $link->type()->isDataValid() ? $input['is_active'] : false;
        }
        $link->save();

        return $link;
    }
}
