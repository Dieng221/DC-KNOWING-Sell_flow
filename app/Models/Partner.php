<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'ligne_fixe',
        'statut',
        'contact',
        'email',
        'client',
        'supplier',
        'user_id',

        // 'adresse',
        // 'numero_identification_fiscal',
        // 'limite_credit',
        // 'adresse_livraison',
        // 'condition_paiement',
        // 'solde_ouverture',
    ];

}
