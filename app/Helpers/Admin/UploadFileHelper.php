<?php

namespace App\Helpers\Admin;

use Illuminate\Support\Facades\Storage;

class UploadFileHelper
{
    public static function uploadFile($request, $result) {
        $path = Storage::put('public/images', $request->file('image'));
        $name = explode('/', $path);
        $result['image'] = $name[count($name) - 1 ];

        return $result;
    }
}
