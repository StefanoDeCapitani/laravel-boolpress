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
        for($i = 0; $i < 5; $i++){
            DB::table('posts')->insert([
                "title" => $faker->catchPhrase(),
                "subtitle" => $faker->sentence(8),
                "content" => "<p>" . $faker->paragraphs(15, true) . "</p>",
                "author" => $faker->firstName(null) . " " . $faker->lastName(),
                "coverImg" => $faker->imageUrl(640, 480, 'animals', true),
                "category" => $faker->word()
            ]);
        }
    }
}
