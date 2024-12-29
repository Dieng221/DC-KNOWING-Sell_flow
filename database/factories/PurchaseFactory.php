<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Purchase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'supplier_id' => \App\Models\Supplier::factory(),
            'prix_sans_tva' => fake()->randomFloat(2, 100, 1000),
            'prix_avec_tva' => fake()->randomFloat(2, 120, 1200),
        ];
    }
}
