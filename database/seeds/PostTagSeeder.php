<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++){
            DB::table('post_tag')->insert([
                "post_id" => $faker->numberBetween(1, 10),
                "tag_id" => $faker->numberBetween(1, 6),
                "created_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
