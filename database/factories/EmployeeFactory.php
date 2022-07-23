<?php

namespace Database\Factories;

use App\Helpers\Admin\CheckHead;
use App\Helpers\Admin\FakerImage;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Factory
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $filepath = public_path('storage\\images');
        return [
            'full_name' => $this->faker->name(),
            'positions_id' => $this->faker->numberBetween(1, Position::all()->count()),
            'date_of_employment' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phone' => $this->faker->numerify('+380#########'),
            'email' => $this->faker->unique()->email(),
            'salary' => $this->faker->numberBetween(0, 500000),
            'image' => FakerImage::image($filepath,300,300, 'people', false,),
//            'image' => 0,
//            'head' => CheckHead::checkHead(),
            'head' => null,
            'admin_created_id' => $this->faker->numberBetween(1, User::all()->count()),
            'admin_updated_id' => $this->faker->numberBetween(1, User::all()->count()),
        ];
    }
}
