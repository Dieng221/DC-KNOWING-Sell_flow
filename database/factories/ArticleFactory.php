<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'libelle' => fake()->word(),
            'quantite' => fake()->numberBetween(1, 100),
            'prix_achat' => fake()->randomFloat(2, 5, 100),
            'prix_vente' => fake()->randomFloat(2, 5, 100),
            'user_id' => \App\Models\User::factory(),
        ];

    }
}
