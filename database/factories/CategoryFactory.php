<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'image' => $this->faker->image('storage/app/products', 640, 480, null, false)
            'image' => 'categories/' . $this->faker->image('public/storage/categories',640,480,null, false),
            //'image' => 'categories/' . $this->faker->image('storage/app/categories', 640, 480, null, false)
        ];
    }
}
