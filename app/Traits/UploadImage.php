<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait UploadImage
{
    /**
     * @var
     */
    private $imagePath;

    /**
     * @param Request $request
     * @param $input
     * @param $storage
     * @return string
     */
    protected function uploadImage(Request $request, $input = 'image', $storage = 'public')
    {
        if (!$request->hasFile($input)) {
            return null;
        }

        $image = $request->file($input);
        $imageName = $request->user()->id . strtotime('now') . '.png';
        $imagePath = get_date_path();
        Storage::disk($storage)->put($imagePath . '/' . $imageName, File::get($image->getRealPath()));
        $this->imagePath = $imagePath . '/' . $imageName;

        return $this->imagePath;
    }

    /**
     * Rollback uploaded file
     */
    protected function rollbackUpload()
    {
        if ($this->imagePath && File::exists($this->imagePath)) {
            File::delete($this->imagePath);
        }
    }
}
