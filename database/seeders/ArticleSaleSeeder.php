<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\ArticleSale;


class ArticleSaleSeeder extends Seeder
{
    public function run()
    {
        ArticleSale::factory()->count(5)->create();
    }
}
