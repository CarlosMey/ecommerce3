<?php

namespace Database\Seeders;

use App\Models\Brand;
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
            [
                'name' => 'Celulares y tablets',
                'slug' => Str::slug('Celulares y tablets'),
                // 'icon' => '<i class="fa-solid fa-mobile-signal-out"></i>'
                'icon' => '<i class="fa-light fa-mobile-notch"></i>'
            ],
            [
                'name' => 'TV, audio y videos',
                'slug' => Str::slug('TV, audio y videos'),
                // 'icon' => '<i class="fa-solid fa-tv"></i>'
                'icon' => '<i class="fa-sharp fa-regular fa-tv"></i>'
            ],
            [
                'name' => 'Consolas y PC',
                'slug' => Str::slug('Consolas y PC'),
                // 'icon' => '<i class="fa-solid fa-gamepad-modern"></i>'
                'icon' => '<i class="fa-solid fa-computer"></i>'
            ],
            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'),
                // 'icon' => '<i class="fa-solid fa-shirt-long-sleeve"></i>'
                'icon' => '<i class="fa-light fa-shirt"></i>'
            ],
            [
                'name' => 'Pesca',
                'slug' => Str::slug('Pesca'),
                // 'icon' => '<i class="fa-solid fa-fishing-rod"></i>'
                'icon' => '<i class="fa-sharp fa-regular fa-fishing-rod"></i>'
            ],
        ];

        foreach($categories as $category){
            // Category::factory(1)->create($category);
            $category = Category::factory(1)->create($category)->first();
            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
