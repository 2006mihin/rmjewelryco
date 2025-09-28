<?php

// database/seeders/CategorySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['rings', 'earrings', 'pendants', 'bracelets'];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['category_name' => $cat]);
        }
    }
}
