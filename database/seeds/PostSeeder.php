<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            DB::table('posts')->insert([
                "title" => Str::random(10),
                "subtitle" => Str::random(10),
                "content" => Str::random(50),
                "author" => Str::random(10),
                "coverImg" => Str::random(10),
                "category" => Str::random(10)
            ]);
        }
    }
}
