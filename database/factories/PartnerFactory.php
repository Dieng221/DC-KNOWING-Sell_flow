<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    protected $model = Partner::class;

    public function definition()
    {
        return [
            'nom' => fake()->company(),
            'ligne_fixe' => fake()->phoneNumber(),
            'adresse' => fake()->address(),
            'numero_identification_fiscal' => fake()->uuid(),
            'limite_credit' => fake()->randomFloat(2, 1000, 5000),
            'statut' => fake()->randomElement(['actif', 'inactif']),
            'contact' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'adresse_livraison' => fake()->address(),
            'solde_ouverture' => fake()->randomFloat(2, 100, 1000),
            'condition_paiement' => fake()->word(),
            'client' => fake()->boolean(),
            'supplier' => fake()->boolean(),
        ];
    }
}
