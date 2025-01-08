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
        // return [
        //     'user_id' => \App\Models\User::factory(),
        //     'supplier_id' => \App\Models\Supplier::factory(),
        //     'prix_sans_tva' => fake()->randomFloat(2, 100, 1000),
        //     'prix_avec_tva' => fake()->randomFloat(2, 120, 1200),
        // ];

        return [
            'partner_id' => \App\Models\Partner::factory(),
            'user_id' => \App\Models\User::factory(),
            'num_ref' => 'INV-' . date('Y-m-d') . '-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT),
            'adresse' => fake()->address(),
            'type_remise' => fake()->randomElement(['pourcentage', 'montant fixe']),
            'valeur_remise' => fake()->randomFloat(2, 10, 100),  // Valeur de la remise
            'montant_payer' => fake()->randomFloat(5, 1000, 50000),
            'date_achat' => fake()->date(),  // Date de l'achat
            'magasin_entrepot' => fake()->word(),  // Magasin ou entrepôt
        ];
    }
}
