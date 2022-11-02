<?php

namespace Database\Factories;
 
use App\Models\Post;
use App\Publishing\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
 
class PostFactory extends Factory
{
    protected $model = Post::class;
 
    public function definition(): array
    {
        $title = $this->faker->sentence();
 
        return [
            'title' => $title,
            'url' => Str::slug($title),
            'summary' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph(),

            
            
        ];
    }
}