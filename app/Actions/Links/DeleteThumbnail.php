<?php

namespace App\Actions\Links;

use App\Models\Link;
use Illuminate\Support\Facades\Storage;
use Throwable;

class DeleteThumbnail
{
    /**
     * @throws Throwable
     */
    public function delete(Link $link): void
    {
        if (
            $link->thumbnail_disk &&
            $link->thumbnail_disk != 'url' &&
            Storage::disk($link->thumbnail_disk)->exists($link->thumbnail)
        ) {
            Storage::disk($link->thumbnail_disk)->delete($link->thumbnail);
        }
        $link->thumbnail = null;
        $link->thumbnail_disk = null;
        $link->save();
    }
}
