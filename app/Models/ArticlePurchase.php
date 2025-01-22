<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'purchase_id',
        'quantite'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
