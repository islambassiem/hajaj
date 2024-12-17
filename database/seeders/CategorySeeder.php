<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'home', 'parent_id' => null],
            ['name' => 'entertainment', 'parent_id' => null],
            ['name' => 'accessories', 'parent_id' => null],
            ['name' => 'family', 'parent_id' => null],
            ['name' => 'electronics', 'parent_id' => null],
            ['name' => 'hobbies', 'parent_id' => null],
            ['name' => 'vehicles', 'parent_id' => null],

            ['name' => 'tools', 'parent_id' => 1],
            ['name' => 'furniture', 'parent_id' => 1],
            ['name' => 'household', 'parent_id' => 1],
            ['name' => 'garden', 'parent_id' => 1],
            ['name' => 'appliances', 'parent_id' => 1],

            ['name' => 'games', 'parent_id' => 2],
            ['name' => 'books', 'parent_id' => 2],
            ['name' => 'movies', 'parent_id' => 2],
            ['name' => 'music', 'parent_id' => 2],

            ['name' => 'bags', 'parent_id' => 3],
            ['name' => 'women', 'parent_id' => 3],
            ['name' => 'men', 'parent_id' => 3],
            ['name' => 'jewelry', 'parent_id' => 3],

            ['name' => 'health', 'parent_id' => 4],
            ['name' => 'beauty', 'parent_id' => 4],
            ['name' => 'pets', 'parent_id' => 4],
            ['name' => 'kids', 'parent_id' => 4],
            ['name' => 'toys', 'parent_id' => 4],

            ['name' => 'computers', 'parent_id' => 5],
            ['name' => 'laptops', 'parent_id' => 5],
            ['name' => 'tablets', 'parent_id' => 5],
            ['name' => 'phones', 'parent_id' => 5],

            ['name' => 'bicycles', 'parent_id' => 6],
            ['name' => 'arts', 'parent_id' => 6],
            ['name' => 'sports', 'parent_id' => 6],
            ['name' => 'parts', 'parent_id' => 6],
            ['name' => 'musicals', 'parent_id' => 6],
            ['name' => 'antiques', 'parent_id' => 6],

            ['name' => 'motorbikes', 'parent_id' => 7],
            ['name' => 'cars', 'parent_id' => 7],
        ];

        foreach($categories as $category){
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'parent_id' => $category['parent_id']
            ]);
        }
    }
}
