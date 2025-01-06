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
            'partner_id' => \App\Models\Partner::factory(), // Crée un partenaire associé automatiquement
            'adresse_facturation' => fake()->address(),
            'statut' => fake()->randomElement(['en_attente', 'confirme', 'livree']),
            'type_remise' => fake()->word(),
            'produits' => fake()->word(),
            'qte_produit' => fake()->numberBetween(1, 10),
            'date_vente' => fake()->date(),
            'condition_paiement' => fake()->word(),
            'adresse_livraison' => fake()->address(),
            'num_facture' => fake()->unique()->numerify('FAC-#####'),
            'valeur_remise' => fake()->randomFloat(2, 10, 100),
            'prix_unitaire' => fake()->randomFloat(2, 5, 50),
        ];
    }
}
