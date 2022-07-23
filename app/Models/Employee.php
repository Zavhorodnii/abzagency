<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'image',
        'positions_id',
        'date_of_employment',
        'phone',
        'email',
        'salary',
        'head',
        'admin_created_id',
        'admin_updated_id'
    ];

    /**
     * @return Attribute
     */
    protected function image() : Attribute {
        return Attribute::make(
            get: fn($value) => Storage::url('images/' . $value),
        );
    }

    /**
     * @return Attribute
     */
    protected function phone() : Attribute {
        return Attribute::make(
            get: fn($value) => '+' . $value,
            set: fn($value) => str_replace('+', '', $value)
        );
    }
}
