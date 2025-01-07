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
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('adresse_facturation');
            $table->string('statut');
            $table->string('type_remise');
            $table->string('date_vente');
            $table->string('condition_paiement');
            $table->string('adresse_livraison');
            $table->string('num_facture');
            $table->decimal('valeur_remise', 10, 2);
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
