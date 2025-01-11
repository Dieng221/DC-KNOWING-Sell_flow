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
            $table->decimal('montant_payer', 8, 2, true)->default(0);
            $table->string('date_vente');
            $table->string('type_remise')->nullable();
            $table->decimal('valeur_remise')->nullable()->default(0);
            $table->string('num_facture');
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
