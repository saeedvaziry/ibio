<?php

namespace App\Actions\Links;

use App\Models\Link;

class DeleteLink
{
    public function delete(Link $link): void
    {
        if ($link->thumbnail) {
            app(DeleteThumbnail::class)->delete($link);
        }

        $link->delete();
    }
}
