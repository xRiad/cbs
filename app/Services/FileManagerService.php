<?php
namespace App\Services;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FileManagerService
{
    public function saveFile($image, $width, $height, $path)
    {
        $imgExtension = $image->getClientOriginalExtension();
        $uuid = Str::uuid();
        $imgName = $uuid . '.' . $imgExtension;

        $imgPath = "$path/$imgName";
        $imageInstance = Image::make($image)->resize($width, $height);

        Storage::disk('public')->put($imgPath, $imageInstance->stream());

        return $imgPath;
    }

    public function deleteFile($filePath)
    {
      if($filePath) {
        if (Storage::disk('public')->exists($filePath)) {
          Storage::disk('public')->delete($filePath);
        }
      }
    }
}