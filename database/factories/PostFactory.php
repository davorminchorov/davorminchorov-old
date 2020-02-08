<?php


use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $title = $faker->sentence(5),
        'slug' => str_slug($title),
        'body' => $faker->paragraph(10),
        'excerpt' => $faker->paragraph(3),
        'published_at' => now(),
    ];
});

$factory->state(Post::class, 'published', function (Faker $faker) {
    return [
        'published_at' => now()->subDays(3),
    ];
});

$factory->state(Post::class, 'unpublished', function (Faker $faker) {
    return [
        'published_at' => now()->addDays(3),
    ];
});
