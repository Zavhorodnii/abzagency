<?php

namespace App\Helpers\Admin;

use Illuminate\Support\Facades\Storage;

class ImageControlHelper
{
    public static function getArrayObjectImage300($fields) {
        foreach ($fields as &$field){
            $field = self::getSingleImage300($field);
        }
        return $fields;
    }

    public static function getSingleImage300($field) {
        $file_name = explode('.', $field['image'])[0] . '.jpg';
        $file = 'public/images/300_' . $file_name;
        if (Storage::disk('local')->exists($file)) {
            $field['image'] = Storage::url($file);
        } else {
            $field['image'] = Storage::url('images/' . $field['image']);
        }
        return $field;
    }
}
