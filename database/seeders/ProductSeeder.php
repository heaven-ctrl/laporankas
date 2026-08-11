<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'code' => 'PRD001',
            'name' => 'Produk A',
            'price' => 10000,
            'stock' => 100,
        ]);

        Product::create([
            'code' => 'PRD002',
            'name' => 'Produk B',
            'price' => 15000,
            'stock' => 50,
        ]);

        Product::create([
            'code' => 'PRD003',
            'name' => 'Produk C',
            'price' => 20000,
            'stock' => 75,
        ]);
    }
}
