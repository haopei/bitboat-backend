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
        DB::table('roles')->insert(['name' => 'buyer']);

        $produces = array(
            array('name' =>  'apples', 'image_url' => 'img/apples.jpg', 'description' => ''),
            array('name' =>  'avocados', 'image_url' => 'img/avocados.jpg', 'description' => ''),
            array('name' =>  'bora', 'image_url' => 'img/bora.jpg', 'description' => ''),
            array('name' =>  'cabbages', 'image_url' => 'img/cabbages.jpg', 'description' => ''),
            array('name' =>  'carrots', 'image_url' => 'img/carrots.jpg', 'description' => ''),
            array('name' =>  'cucumbers', 'image_url' => 'img/cucumbers.jpg', 'description' => ''),
            array('name' =>  'eggplants', 'image_url' => 'img/eggplants.jpg', 'description' => ''),
            array('name' =>  'eggplants2', 'image_url' => 'img/eggplants2.jpg', 'description' => ''),
            array('name' =>  'grapes', 'image_url' => 'img/grapes.jpg', 'description' => ''),
            array('name' =>  'lemons', 'image_url' => 'img/lemons.jpg', 'description' => ''),
            array('name' =>  'lettuces', 'image_url' => 'img/lettuces.jpg', 'description' => ''),
            array('name' =>  'mangoes', 'image_url' => 'img/mangoes.jpg', 'description' => ''),
            array('name' =>  'onions', 'image_url' => 'img/onions.jpg', 'description' => ''),
            array('name' =>  'oranges', 'image_url' => 'img/oranges.jpg', 'description' => ''),
            array('name' =>  'papayas', 'image_url' => 'img/papayas.jpg', 'description' => ''),
            array('name' =>  'papayas2', 'image_url' => 'img/papayas2.jpg', 'description' => ''),
            array('name' =>  'potatoes', 'image_url' => 'img/potatoes.jpg', 'description' => ''),
            array('name' =>  'pumpkins', 'image_url' => 'img/pumpkins.jpg', 'description' => ''),
            array('name' =>  'tomatoes', 'image_url' => 'img/tomatoes.jpg', 'description' => '')
        );

        foreach ($produces as $item) {
            DB::table('produces')->insert([
                'name' => $item['name'],
                'image_url' => $item['image_url'],
                'description' => $faker->paragraph(2)
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
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

            $userType = rand(1, 2);
            DB::table('user_roles')->insert([
                'user_id' => $i,
                'role_id' => $userType
            ]);

            for ($x = 1; $x <= 5; $x++ ) {
                DB::table('suppliers')->insert([
                    'user_id' => $i,
                    'produce_id' => rand(1, 20),
                    'availability' => rand(0, 1),
                    'quantity' => rand(5, 300)
                ]);
            }

            for ($x = 1; $x <= 3; $x++ ) {
                DB::table('orders')->insert([
                    'user_id' => $i,
                    'produce_id' => rand(1, 20),
                    'quantity' => rand(200, 800),
                    'delivery_location_id' => 1,
                    'price' => rand (120, 300),
                    'active' => rand(0, 1)
                ]);
            }

        }
    }
}
