<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PostCategory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['draft', 'publish','private']),
            'category_id' => PostCategory::inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->first(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
