<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

//         \App\Models\City::factory(10)->create([
//
//         ]);
        DB::table('roles')->insert([
            'name' => "Admin",
        ]);
        DB::table('roles')->insert([
            'name' => "Seller",
        ]);
        DB::table('payment_methods')->insert([
            'name' => "Card",
        ]);

        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {

            DB::table('cities')->insert([
                'name' => $faker->city,
            ]);
            DB::table('brands')->insert([
                'name' => $faker->company,
            ]);
            DB::table('categories')->insert([
                'name' => $faker->word,
            ]);
            DB::table('categories')->insert([
                'name' => $faker->word,
            ]);

            DB::table('users')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email(),
                'mobile' => $faker->phoneNumber(10),
                'address' => $faker->address,
                'password' => Hash::make("123456"),
                'cities_id' => 1,
                'roles_id' => 1,
                'image_url' => $faker->filePath(),
            ]);
        }




    }
}
