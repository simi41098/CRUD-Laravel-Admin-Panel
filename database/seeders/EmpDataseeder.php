<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;
use App\Models\Company;

class EmpDataseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
{
    $companies = Company::all()->pluck('id')->toArray();
	for ($i = 0; $i < 10; $i++) {
		DB::table('employees')->insert([
            // 'id' => $i,
			'fname' => $faker->name,
			'lname' => $faker->name,
			'email' => $faker->unique()->safeEmail,
			'company_id' => $faker->randomElement($companies),
			'phone' => $faker->numerify('##########'),
               ]);
	}
}
}
