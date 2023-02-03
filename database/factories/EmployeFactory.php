<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genders = ['male', 'female'];
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('123'),
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'role_id' => rand(1,5),
            'gender' => $genders[rand(0,1)],
            'thumbnail' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
        ];
    }
}
