<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Supplier;


class SupplierSeeder extends Seeder
{
    public function run()
    {
        Supplier::factory()->count(5)->create();
    }
}
