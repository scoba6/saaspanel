<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestataire>
 */
class PrestataireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rsnpre' => $this->faker->name(),
            'telpre' => $this->faker->phoneNumber(),
            'mailpre' => $this->faker->email(),
            'adrpre' => $this->faker->address(),
            'vilpre' => $this->faker->city(),
            'paypre' => $this->faker->country(),
            'active' => $this->faker->boolean(100),
        ];
    }
}
