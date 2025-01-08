<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'user_id',
        'num_ref',
        'adresse',
        'type_remise',
        'valeur_remise',
        'date_achat',
        'magasin_entrepot',
        'montant_payer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_purchases')->withPivot('quantite');;
    }
}
