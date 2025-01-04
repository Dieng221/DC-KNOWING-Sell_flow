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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->references('id')->on('partners');
            // $table->decimal('prix_sans_tva', 10, 2);
            // $table->decimal('prix_avec_tva', 10, 2);
            $table->string('adresse_facturation');
            $table->string('statut');
            $table->string('type_remise');
            $table->string('produits');
            $table->string('qte_produit');
            $table->string('date_vente');
            $table->string('condition_paiement');
            $table->string('adresse_livraison');
            $table->string('num_facture');
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
        Schema::dropIfExists('sales');
    }
};
