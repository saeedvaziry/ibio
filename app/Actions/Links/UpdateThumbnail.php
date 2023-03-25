<?php

namespace App\Actions\Links;

use App\Models\Link;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\Storage;
use Throwable;

class UpdateThumbnail
{
    use UploadFile;

    /**
     * @throws Throwable
     */
    public function update(Link $link): void
    {
        $this->validate();

        if (request()->input('type') == 'upload') {
            if ($link->thumbnail && $link->thumbnail_disk) {
                if (Storage::disk($link->thumbnail_disk)->exists($link->thumbnail)) {
                    Storage::disk($link->thumbnail_disk)->delete($link->thumbnail);
                }
            }
            try {
                $link->thumbnail_disk = config('filesystems.default_public');
                $link->thumbnail = $this->uploadFile(request()->file('thumbnail'), $link->thumbnail_disk);
                $link->save();
            } catch (Throwable $e) {
                $this->rollbackUpload();
                throw $e;
            }
        }
    }

    private function validate(): void
    {
        request()->validate([
            'type' => [
                'required',
                'in:upload,icon',
            ],
        ]);
        if (request()->input('type') == 'upload') {
            request()->validate([
                'thumbnail' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
            ]);
        }
    }
}
