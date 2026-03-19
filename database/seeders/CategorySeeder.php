<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Removed the 'slug' column to fix the Database error
        $categories = [
            ['name' => 'Lacquerware'],
            ['name' => 'Traditional Umbrella'],
            ['name' => 'Traditional Puppets'],
            ['name' => 'Pottery'],
            ['name' => 'Bamboo Basketry'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}