<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Sale;


class SaleSeeder extends Seeder
{
    public function run()
    {
        Sale::factory()->count(10)->create();
    }
}
