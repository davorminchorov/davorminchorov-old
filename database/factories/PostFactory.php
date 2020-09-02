<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return ['user_id' => 1, 'title' => $title = $this->faker->sentence(5), 'slug' => str_slug($title), 'body' => $this->faker->paragraph(10), 'excerpt' => $this->faker->paragraph(3), 'published_at' => now()];
    }

    public function published()
    {
        return $this->state(function () {
            return ['published_at' => now()->subDays(3)];
        });
    }

    public function unpublished()
    {
        return $this->state(function () {
            return ['published_at' => now()->addDays(3)];
        });
    }
}
