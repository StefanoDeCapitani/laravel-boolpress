<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = [
            "Tecnologia", "Hi-Tech", "Programmazione", "Frontend", "Backend", "Novità"
        ];

        $styles = ['badge-primary', 'badge-secondary', 'badge-success', 'badge-danger', 'badge-warning', 'badge-info'];

        foreach($tags as $i=>$tag){
            DB::table('tags')->insert([
                "name" => $tag,
                "style" => $styles[$i],
                "created_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
