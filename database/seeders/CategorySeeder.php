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
            ['name_ar' => 'المنزل', 'name_en' => 'home', 'parent_id' => null],
            ['name_ar' => 'الترفيه', 'name_en' => 'entertainment', 'parent_id' => null],
            ['name_ar' => 'الاكسسوارات', 'name_en' => 'accessories', 'parent_id' => null],
            ['name_ar' => 'العائلة', 'name_en' => 'family', 'parent_id' => null],
            ['name_ar' => 'الالكترونيات', 'name_en' => 'electronics', 'parent_id' => null],
            ['name_ar' => 'الهوايات', 'name_en' => 'hobbies', 'parent_id' => null],
            ['name_ar' => 'المركبات', 'name_en' => 'vehicles', 'parent_id' => null],
            ['name_ar' => 'العقارات', 'name_en' => 'real state', 'parent_id' => null],
            ['name_ar' => 'أخرى', 'name_en' => 'others', 'parent_id' => null],

            ['name_ar' => 'الادوات', 'name_en' => 'tools', 'parent_id' => 1],
            ['name_ar' => 'الاثاث', 'name_en' => 'furniture', 'parent_id' => 1],
            ['name_ar' => 'لوازم المنزل', 'name_en' => 'household', 'parent_id' => 1],
            ['name_ar' => 'الحديقة', 'name_en' => 'garden', 'parent_id' => 1],
            ['name_ar' => 'الاجهزة', 'name_en' => 'appliances', 'parent_id' => 1],

            ['name_ar' => 'الالعاب', 'name_en' => 'games', 'parent_id' => 2],
            ['name_ar' => 'الكتب', 'name_en' => 'books', 'parent_id' => 2],
            ['name_ar' => 'الافلام', 'name_en' => 'movies', 'parent_id' => 2],
            ['name_ar' => 'الموسيقى', 'name_en' => 'music', 'parent_id' => 2],

            ['name_ar' => 'الشنط', 'name_en' => 'bags', 'parent_id' => 3],
            ['name_ar' => 'لوازم النساء', 'name_en' => 'women', 'parent_id' => 3],
            ['name_ar' => 'لوازم الرجال', 'name_en' => 'men', 'parent_id' => 3],
            ['name_ar' => 'المجوهرات', 'name_en' => 'jewelry', 'parent_id' => 3],

            ['name_ar' => 'الصحة', 'name_en' => 'health', 'parent_id' => 4],
            ['name_ar' => 'الجمال', 'name_en' => 'beauty', 'parent_id' => 4],
            ['name_ar' => 'الحيوانات الاليفة', 'name_en' => 'pets', 'parent_id' => 4],
            ['name_ar' => 'الاطفال', 'name_en' => 'kids', 'parent_id' => 4],
            ['name_ar' => 'العاب الاطفال', 'name_en' => 'toys', 'parent_id' => 4],

            ['name_ar' => 'كمبيوتر', 'name_en' => 'computers', 'parent_id' => 5],
            ['name_ar' => 'لاب توب', 'name_en' => 'laptops', 'parent_id' => 5],
            ['name_ar' => 'تابلت', 'name_en' => 'tablets', 'parent_id' => 5],
            ['name_ar' => 'هواتف', 'name_en' => 'phones', 'parent_id' => 5],

            ['name_ar' => 'دراجات', 'name_en' => 'bicycles', 'parent_id' => 6],
            ['name_ar' => 'فنون', 'name_en' => 'arts', 'parent_id' => 6],
            ['name_ar' => 'رياضه', 'name_en' => 'sports', 'parent_id' => 6],
            ['name_ar' => 'قطع غيار', 'name_en' => 'parts', 'parent_id' => 6],
            ['name_ar' => 'ادوات موسيقية', 'name_en' => 'musicals', 'parent_id' => 6],
            ['name_ar' => 'تحف', 'name_en' => 'antiques', 'parent_id' => 6],

            ['name_ar' => 'دراجات ناريه', 'name_en' => 'motorbikes', 'parent_id' => 7],
            ['name_ar' => 'سيارات', 'name_en' => 'cars', 'parent_id' => 7],

            ['name_ar' => 'للبيع', 'name_en' => 'sale', 'parent_id' => 8],
            ['name_ar' => 'للإيجار', 'name_en' => 'rent', 'parent_id' => 8],

            ['name_ar' => 'اخرى', 'name_en' => 'other', 'parent_id' => 9],
        ];

        foreach($categories as $category){
            Category::create([
                'name_en' => $category['name_en'],
                'name_ar' => $category['name_ar'],
                'slug' => Str::slug($category['name_en']),
                'parent_id' => $category['parent_id']
            ]);
        }
    }
}
