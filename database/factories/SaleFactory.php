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
            'user_id' => \App\Models\User::factory(), // Crée un user associé automatiquement
            'partner_id' => \App\Models\Partner::factory(), // Crée un partenaire associé automatiquement
            'adresse_facturation' => fake()->address(),
            'type_remise' => fake()->randomElement(['pourcentage', 'montant fixe']),
            'valeur_remise' => fake()->randomFloat(2, 10, 100),
            'date_vente' => fake()->date(),
            'adresse_livraison' => fake()->address(),
            'num_facture' => 'INV-' . date('Y-m-d') . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT),
        ];
    }
}
