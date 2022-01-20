<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Web Design", "HTML", "Freebies", "JavaScript", "CSS", "Tutorials"
        ];

        foreach($categories as $category){
            DB::table('categories')->insert([
                "name" => $category,
                "created_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
