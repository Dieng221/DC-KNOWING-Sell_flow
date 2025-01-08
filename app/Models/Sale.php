<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'user_id',
        'adresse_facturation',
        'montant_payer',
        'date_vente',
        'type_remise',
        'valeur_remise',
        'adresse_livraison',
        'num_facture',
    ];

    // Relations avec Partner et User
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_sales');
    }
}
