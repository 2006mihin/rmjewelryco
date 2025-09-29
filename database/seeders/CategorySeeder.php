<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Rings', 'Earrings', 'Pendants', 'Bracelets'];

        foreach ($categories as $name) {
            Category::updateOrCreate(
                ['category_name' => $name]
            );
        }
    }
}
