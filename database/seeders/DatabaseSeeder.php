<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(3)->create()->each(function ($user){

           $posts = Post::factory(3)->create(['user_id' => $user->id]);

           foreach ($posts as $post){
               $tags = Tag::factory(2)->create();

               foreach($tags as $tag){
                   PostTag::factory(2)->state([
                       'post_id' => $post->id,
                       'tag_id' => $tag->id
                   ])->create();
               }
           }

        });

        Comment::factory(20)->create();

    }

}
