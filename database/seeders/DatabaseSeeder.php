<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
    {
        \App\Models\User::factory()->create([
            'nom' => 'N\'DOUFFOU',
            'prenom' => 'NAZAIRE',
            'numero' => '0102030405',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::factory(2)->create();
        \App\Models\Article::factory(20)->create();
        \App\Models\Partner::factory(10)->create();
        \App\Models\Sale::factory(10)->create();
        \App\Models\Purchase::factory(10)->create();
        \App\Models\ArticleSale::factory(30)->create();
        \App\Models\ArticlePurchase::factory(30)->create();
        \App\Models\Admin::factory(5)->create();
    }
}
