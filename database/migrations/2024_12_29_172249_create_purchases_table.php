<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->references('id')->on('users');
            // $table->foreignId('supplier_id')->references('id')->on('suppliers');
            // $table->decimal('prix_sans_tva', 10, 2);
            // $table->decimal('prix_avec_tva', 10, 2);


            $table->foreignId('partner_id')->references('id')->on('partners');
            $table->string('num_ref');
            $table->string('adresse');
            $table->string('type_remise');
            $table->string('produits');
            $table->string('qte_produit');
            $table->string('date_achat');
            $table->string('condition_paiement');
            $table->string('statut');
            $table->string('magasin_entrepot');
            $table->string('valeur_remise');
            $table->string('prix_unitaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
