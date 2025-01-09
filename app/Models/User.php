<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'nom',
        'prenom',
        'numero',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


     /**
     * Récupère l'identifiant unique pour le JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // Par défaut, c'est l'ID de l'utilisateur
        return $this->getKey();
    }

    /**
     * Récupère les revendications personnalisées du JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // Tu peux ajouter des données personnalisées ici si nécessaire
        return [];
    }
}
