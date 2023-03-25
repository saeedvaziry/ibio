<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    private string $disk = '';

    private string $filePath = '';

    protected function uploadFile(UploadedFile $file, string $disk = 'local'): ?string
    {
        $this->disk = $disk;

        $this->filePath = $file->store('', ['disk' => $disk]);

        return $this->filePath;
    }

    protected function rollbackUpload(): void
    {
        if ($this->filePath && Storage::disk($this->disk)->exists($this->filePath)) {
            Storage::disk($this->disk)->delete($this->filePath);
        }
    }
}
