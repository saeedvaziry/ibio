<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasProfilePhoto
{
    public function updateProfilePhoto(UploadedFile $photo): void
    {
        tap($this->avatar, function ($previous) use ($photo) {
            $this->forceFill([
                'avatar' => $photo->store(
                    '', ['disk' => $this->profilePhotoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->profilePhotoDisk())->delete($previous);
            }
        });
    }

    public function deleteProfilePhoto(): void
    {
        Storage::disk($this->profilePhotoDisk())->delete($this->avatar);

        $this->forceFill([
            'avatar' => null,
        ])->save();
    }

    public function getProfilePhotoUrlAttribute(): string
    {
        return $this->avatar
            ? Storage::disk($this->profilePhotoDisk())->url($this->avatar)
            : $this->defaultProfilePhotoUrl();
    }

    protected function defaultProfilePhotoUrl(): ?string
    {
        return null;
    }

    protected function profilePhotoDisk(): string
    {
        return config('filesystems.default_public');
    }
}
