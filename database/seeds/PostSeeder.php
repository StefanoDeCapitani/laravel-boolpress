<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        for($i = 0; $i < 10; $i++){
            DB::table('posts')->insert([
                "title" => $faker->catchPhrase(),
                "subtitle" => $faker->sentence(8),
                "content" => "<p>" . $faker->paragraphs(15, true) . "</p>",
                "user_id" => $faker->numberBetween(1, 10),
                "coverImg" => "http://127.0.0.1:8000/storage/images/blog-post-cover.jpeg",
                "category_id" => $faker->numberBetween(1, 6),
                "created_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
