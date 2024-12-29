<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Sale;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'prix_sans_tva' => fake()->randomFloat(2, 100, 1000),
            'prix_avec_tva' => fake()->randomFloat(2, 120, 1200),
        ];
    }
}
