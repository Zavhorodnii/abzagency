<?php

namespace App\Helpers\Admin;

use App\Models\Employee;

class CheckHead
{
    public static function checkHead() {
        $count = Employee::all()->count();
        try {
            if ( $count == 0 )
                return null;
            do {
                $id = fake()->numberBetween(1, $count);
                $status = self::check($id, 0);
            } while ( !$status );
        } catch (Exception $e) {
            $id = null;
        }
        return $id;
    }

    public static function check($id, $deep) : bool {
        $item = Employee::where('id', $id)->value('head');
        if ( $deep < 5 ) {
            if ($item == null) {
                return true;
            } else {
                return self::check($item, ++$deep);
            }
        } else {
            if ($item == null) {
                return true;
            } else {
                return false;
            }
        }
    }
}
