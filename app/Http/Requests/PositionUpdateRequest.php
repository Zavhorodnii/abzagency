<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PositionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        echo  $this->route('id');

        return [
            'full_name' => 'required|string|max:255',
            'positions_id' => Rule::exists('positions', 'id'),
            'date_of_employment' => 'required|date_format:Y-m-d',
            'phone' => 'required|integer|digits_between:12,12',
            'email' => 'required|email|unique:employees,email,' . $this->route('employee')->id,
            'salary' => 'required|integer|between:0,500000',
            'image' => 'required|mimes:jpg,png|max:5120|dimensions:min_width=300,min_height=300',
            'head' => Rule::exists('employees', 'id'),
        ];
    }
}
