<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            DB::table('users')->insert([
                "name" => $faker->firstName(null) . " " . $faker->lastName(),
                "email" => "prova" . $i . "@prova.it",
                "password" => Hash::make("password1234"),
                "role" => $i === 0 ? "admin" : "user",
                "created_at" => date("Y-m-d H:i:s"),
            ]);
        } 
    }
}
