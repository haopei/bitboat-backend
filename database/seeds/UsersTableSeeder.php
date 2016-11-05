<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i < 1000; $i++ ) {
            DB::table('users')->insert([
                'first_name' => $faker->firstName, 
                'last_name' => $faker->lastName, 
                'business_name' => $faker->company, 
                'location_id' => $faker->randomDigitNotNull,
                'image_url' => $faker->url,
                'description' =>  $faker->paragraph(1),
                'email' => $faker->email,
                'password' => bcrypt('bitboat'),
            ]);
        }
    }
}
