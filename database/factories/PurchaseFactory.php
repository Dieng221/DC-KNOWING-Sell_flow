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
            // Si vous avez les relations commentées, vous pouvez les activer comme suit :
            // 'user_id' => User::factory(), // Crée un utilisateur associé automatiquement
            // 'supplier_id' => Supplier::factory(), // Crée un fournisseur associé automatiquement

            'partner_id' => \App\Models\Partner::factory(), // Crée un partenaire associé automatiquement

            'num_ref' => fake()->unique()->numerify('ACH-#####'), // Numéro de référence unique
            'adresse' => fake()->address(),  // Adresse associée à l'achat
            'type_remise' => fake()->word(),  // Type de remise (ex: pourcentage, montant fixe)
            'produits' => fake()->word(),  // Produits achetés (vous pouvez remplacer par une liste plus détaillée si nécessaire)
            'qte_produit' => fake()->numberBetween(1, 100),  // Quantité de produits
            'date_achat' => fake()->date(),  // Date de l'achat
            'condition_paiement' => fake()->word(),  // Condition de paiement (ex: à crédit, au comptant)
            'statut' => fake()->randomElement(['en_attente', 'confirme', 'livree']), // Statut de la commande
            'magasin_entrepot' => fake()->word(),  // Magasin ou entrepôt
            'valeur_remise' => fake()->randomFloat(2, 10, 100),  // Valeur de la remise
            'prix_unitaire' => fake()->randomFloat(2, 5, 100),  // Prix unitaire des produits
        ];
    }
}
