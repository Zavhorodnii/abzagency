<?php

namespace App\Helpers\Admin;

use App\Models\Employee;

class CheckHead
{
    /**
     * Create in faker
     * @return int|null
     */
    public static function checkHead() {
        $count = Employee::all()->count();
        try {
            if ( $count == 0 )
                return null;
            do {
                $id = fake()->numberBetween(1, $count);
                $status = self::check($id);
            } while ( !$status );
        } catch (Exception $e) {
            $id = null;
        }
        return $id;
    }

    /**
     * Check Head by id
     * @param int $id
     * @param int $deep
     * @return bool
     */
    public static function check(int $id, int $deep=0) : bool {
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
