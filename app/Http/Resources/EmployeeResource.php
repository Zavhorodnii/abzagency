<?php

namespace App\Http\Resources;

use App\Models\Position;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'full_name' => $this->full_name,
            'position' => $this->position->title ,
            'date_of_employment' => $this->date_of_employment,
            'phone' => $this->phone,
            'email' => $this->email,
            'salary' => $this->salary,
            'admin_created_id' => $this->admin_created_id,
            'admin_updated_id' => $this->admin_updated_id
        ];
    }
}
