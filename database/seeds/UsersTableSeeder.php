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
        DB::table('roles')->insert(['name' => 'supplier']);
        DB::table('roles')->insert(['name' => 'producer']);

        for ($i = 1; $i <= 100; $i++) {
            DB::table('produces')->insert([
                'name' => "$faker->word $faker->word",
                'image_url' => $faker->imageUrl(640, 480),
                'description' => $faker->paragraph(2)
            ]);
        }

        for ($i = 1; $i <= 200; $i++) {
            DB::table('locations')->insert([
                'country' => 'Guyana',
                'region' =>  $faker->city,
                'address' => $faker->address
            ]);
        }


        for ($i = 1; $i <= 10; $i++ ) {
            DB::table('users')->insert([
                'first_name' => $faker->firstName, 
                'last_name' => $faker->lastName, 
                'landline' => $faker->phoneNumber,
                'cellphone' => $faker->phoneNumber,
                'business_name' => $faker->company, 
                'location_id' => $faker->randomDigitNotNull,
                'image_url' => $faker->url,
                'description' =>  $faker->paragraph(1),
                'email' => $faker->email,
                'password' => bcrypt('bitboat'),
            ]);

            DB::table('user_roles')->insert([
                'user_id' => $i,
                'role_id' => rand(1, 2)
            ]);

        }
    }
}
