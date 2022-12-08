<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = rand(1, 100) > 75 ? 'male':'female';
        return [
            'hn' => fake()->numberBetween(44001000, 55001000),
            'name' => implode(' ', [fake()->title($gender), fake()->firstName($gender), fake()->lastName($gender)]),
            'gender' => $gender,
            'dob' => fake()->dateTimeBetween('-90 years', '-18 years')->format('Y-m-d'),
            'address' => str(fake()->address())->replace("\n", "\r\n")->toString(),
            'tel_no' => fake()->e164PhoneNumber(),
        ];
    }
}
