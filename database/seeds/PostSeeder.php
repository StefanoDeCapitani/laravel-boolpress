<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\PostSlug;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){
            DB::table('posts')->insert([
                "title" => $faker->catchPhrase(),
                "slug" => $i,
                "subtitle" => $faker->sentence(8),
                "content" => "<p>" . $faker->paragraphs(15, true) . "</p>",
                "user_id" => $faker->numberBetween(1, 10),
                "coverImg" => "posts/images/blog-post-cover-" . $faker->numberBetween(1, 9) . ".jpeg",
                "category_id" => $faker->numberBetween(1, 6),
                "created_at" => date("Y-m-d H:i:s"),
            ]);
        }

        $posts = Post::all();
        foreach($posts as $post){
            $post->slug = PostSlug::generateUniqueSlug($post);
            $post->save();
        }
    }
}
