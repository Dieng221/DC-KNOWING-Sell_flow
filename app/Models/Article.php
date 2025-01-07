<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'quantite',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'article_sales');
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'article_purchases');
    }
}
