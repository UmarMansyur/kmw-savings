<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
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
            'saving_category_id' => rand(1, 3),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('123'),
            'name' => $this->faker->name,
            'address' =>$this->faker->address,
            'gender' => $genders[rand(0,1)],
            'phone' => $this->faker->phoneNumber,
            'thumbnail' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
            'file' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
        ];
    }
}
