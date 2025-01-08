<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\ArticleSale;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleSale>
 */
class ArticleSaleFactory extends Factory
{
    protected $model = ArticleSale::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'article_id' => \App\Models\Article::factory(),
            'sale_id' => \App\Models\Sale::factory(),
            'quantite' => fake()->numberBetween(1, 100),
        ];
    }
}
