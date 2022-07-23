<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
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
        return [
            'full_name' => 'required|string|max:255',
            'positions_id' => Rule::exists('positions', 'id'),
            'date_of_employment' => 'required|date_format:Y-m-d',
            'phone' => 'required|integer|digits_between:12,12',
            'email' => 'required|email|unique:employees,email',
            'salary' => 'required|integer|between:0,500000',
            'image' => 'required|mimes:jpg,png|max:5120|dimensions:min_width=300,min_height=300',
            'head' => Rule::exists('employees', 'id'),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.max' => "Maximum file size to upload is 5MB (5120 KB). Try to reduce its resolution to make it under 5MB"
        ];
    }
}
