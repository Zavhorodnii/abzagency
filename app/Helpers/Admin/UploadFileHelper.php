<?php

namespace App\Helpers\Admin;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class UploadFileHelper
{
    public static function uploadFile($request, $result) {
        $path = Storage::put('public/images', $request->file('image'));
        $name = explode('/', $path);
        $image_name = $name[count($name) - 1 ];
        $storage_path = Storage::path('public\\images\\' . $image_name);
        $save_image_name = explode('.', $name[count($name) - 1 ])[0];
        echo $save_image_name;
        Image::make($storage_path)
            ->fit(300)
            ->save(Storage::path('public\images\300_' . $save_image_name . '.jpg'), 80);

        $result['image'] = $image_name;

        return $result;
    }
}
