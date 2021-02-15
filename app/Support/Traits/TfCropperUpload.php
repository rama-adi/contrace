<?php


namespace App\Support\Traits;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait TfCropperUpload
{
    public function save_to_storage(string $image, string $path, int $width, int $height) : string
    {
        $teamID = Auth::user()->currentTeam->id;
        $filename = Str::random(10);
        $img = Image::make($image)
            ->resize($width, $height);

        Storage::disk('public')->put("{$path}/{$teamID}/{$filename}.png", (string) $img->encode());
        return "{$path}/{$teamID}/{$filename}.png";
    }

    public function delete_from_storage($path)
    {
        Storage::disk('public')->delete($path);
    }
}
