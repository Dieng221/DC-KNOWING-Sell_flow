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
        'adresse',
        'numero_identification_fiscal',
        'limite_credit',
        'statut',
        'contact',
        'email',
        'adresse_livraison',
        'condition_paiement',
        'solde_ouverture',
        'client',
        'supplier',
        'user_id'
    ];

}
