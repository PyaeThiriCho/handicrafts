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
            ['name' => 'Lacquerware', 'image' => 'lacquerware/photo (1).jpg'],
            ['name' => 'Traditional Umbrella', 'image' => 'umbrella/photo (4).jpg'],
            ['name' => 'Traditional Puppets', 'image' => 'puppets/photo (1).jpg'],
            ['name' => 'Pottery', 'image' => 'pottery/photo (11).jpg'],
            ['name' => 'Bamboo Basketry', 'image' => 'bamboo-basket/photo (6).jpg'],
            ['name' => 'Handmade Bag Set', 'image' => 'handmade-bags/photo (2).jpg'], 
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}