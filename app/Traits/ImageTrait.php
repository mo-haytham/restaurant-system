<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageTrait
{
    function saveImage($image_original, $path)
    {
        $img_extension = $image_original->getClientOriginalExtension();
        $img_name = time() . rand(0, 99) . '.' . $img_extension;
        $image_original->move($path, $img_name);
        return $path . '/' . $img_name;
    }

    function deleteImage($image)
    {
        File::delete($image);
    }
}
