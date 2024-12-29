<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'sale_id',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
