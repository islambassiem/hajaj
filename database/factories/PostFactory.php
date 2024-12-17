<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user       = collect(User::all())->random();
        $category   = collect(Category::whereNotNull('parent_id')->get())->random();
        return [
          'user_id' => $user->id,
          'category_id' => $category->id,
          'title' => fake()->sentence(),
          'description' => fake()->sentence(100),
          'price' => fake()->randomNumber(3)
        ];
    }
}
