<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // \App\Models\User::factory(10)->create();

    //     // \App\Models\User::factory()->create([
    //     //     'name' => 'Test User',
    //     //     'email' => 'test@example.com',
    //     // ]);
    // }

    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(20)->create();
        \App\Models\Client::factory(20)->create();
        \App\Models\Sale::factory(10)->create();
        \App\Models\Supplier::factory(10)->create();
        \App\Models\Purchase::factory(10)->create();
        \App\Models\ArticleSale::factory(30)->create();
        \App\Models\ArticlePurchase::factory(30)->create();
        \App\Models\Admin::factory(5)->create();
    }
}
