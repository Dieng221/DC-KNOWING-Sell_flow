<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\ArticlePurchase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticlePurchaseFactory extends Factory
{
    protected $model = ArticlePurchase::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'article_id' => \App\Models\Article::factory(),
            'purchase_id' => \App\Models\Purchase::factory(),
            'quantite' => fake()->numberBetween(1, 100),
        ];
    }
}
