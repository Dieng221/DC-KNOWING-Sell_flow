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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('ligne_fixe');
            $table->string('adresse');
            $table->string('numero_identification_fiscal');

            $table->string('limite_credit');
            $table->string('statut');
            $table->string('contact');
            $table->string('email');

            $table->string('adresse_livraison');
            $table->string('solde_ouverture');
            $table->string('condition_paiement');
            $table->boolean('client');
            $table->boolean('supplier');

            // $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
