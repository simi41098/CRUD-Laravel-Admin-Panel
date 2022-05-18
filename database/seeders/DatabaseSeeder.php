<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FakedataSeeder;
use Database\Seeders\EmpDataSeeder;
use Database\Seeders\UserSeeding;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Company::factory(10)->create();

        // \App\Models\Company::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'web' => 'www.example.com',
        //     'image' => 'HASH2356789532',
        // ]);

        // $faker = \Faker\Factory::create();

        // DB::table("companies")->insert([
        //     "name" => $faker->name(),
        //     "email" => $faker->safeEmail,
        //     "web" => $faker->text,
        //     "image" => $faker->number,
        // ]);

        $this->call([
            Userseeding::class
        ]);
    }
}
