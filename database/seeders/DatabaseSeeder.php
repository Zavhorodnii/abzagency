<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Vitalii1',
             'email' => 'test1@example.com',
             'password' => Hash::make('12345678')
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Vitalii2',
             'email' => 'test2@example.com',
             'password' => Hash::make('12345678')
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Vitalii3',
             'email' => 'test3@example.com',
             'password' => Hash::make('12345678')
         ]);


        $this->call([
            PositionSeeder::class,
            EmployeeSeeder::class
        ]);
    }
}
