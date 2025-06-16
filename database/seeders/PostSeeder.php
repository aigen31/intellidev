<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(50)->create();
        $categories = Category::all();
        foreach ($posts as $post) {
            $post->categories()->attach($categories->random(2));
            Comment::factory(3)->create([
                'post_id' => $post->id,
            ]);
            foreach (config('app.available_locales') as $locale => $slug) {
                PostTranslation::factory()->create([
                    'post_id' => $post->id,
                    'locale' => $slug
                ]);
            }
        }
    }
}
