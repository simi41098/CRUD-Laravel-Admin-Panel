<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

class Fakedataseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run(Faker $faker)
{
	for ($i = 0; $i < 20; $i++) {
		DB::table('companies')->insert([
            // 'id' => $i,
			'name' => $faker->name,
			'email' => $faker->unique()->safeEmail,
			'web' => $faker->word,
			'image' => $faker->word,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
               ]);
	}
}
}
