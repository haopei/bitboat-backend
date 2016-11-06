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

        //Pine apple
        $produces = array(
            array('name' =>  'apples', 'image_url' => 'img/apples.jpg', 'description' => '', 'price_avg' => '450', 'monthly_avg' => '45000'),
            array('name' =>  'avocados', 'image_url' => 'img/avocados.jpg', 'description' => '', 'price_avg' => '500', 'monthly_avg' => '9000'),
            array('name' =>  'bora', 'image_url' => 'img/bora.jpg', 'description' => '', 'price_avg' => '80', 'monthly_avg' => '6000'),
            array('name' =>  'cabbages', 'image_url' => 'img/cabbages.jpg', 'description' => '', 'price_avg' => '160', 'monthly_avg' => '8500'),
            array('name' =>  'carrots', 'image_url' => 'img/carrots.jpg', 'description' => '', 'price_avg' => '200', 'monthly_avg' => '20000'),
            array('name' =>  'cucumbers', 'image_url' => 'img/cucumbers.jpg', 'description' => '', 'price_avg' => '40', 'monthly_avg' => '50000'),
            array('name' =>  'eggplants', 'image_url' => 'img/eggplants.jpg', 'description' => '', 'price_avg' => '35', 'monthly_avg' => '12000'),
            array('name' =>  'eggplants2', 'image_url' => 'img/eggplants2.jpg', 'description' => '', 'price_avg' => '45', 'monthly_avg' => '13000'),
            array('name' =>  'grapes', 'image_url' => 'img/grapes.jpg', 'description' => '', 'price_avg' => '300', 'monthly_avg' => '9000'),
            array('name' =>  'lemons', 'image_url' => 'img/lemons.jpg', 'description' => '', 'price_avg' => '600', 'monthly_avg' => '6700'),
            array('name' =>  'lettuces', 'image_url' => 'img/lettuces.jpg', 'description' => '', 'price_avg' => '340', 'monthly_avg' => '34535'),
            array('name' =>  'mangoes', 'image_url' => 'img/mangoes.jpg', 'description' => '', 'price_avg' => '24', 'monthly_avg' => '13531'),
            array('name' =>  'onions', 'image_url' => 'img/onions.jpg', 'description' => '', 'price_avg' => '90', 'monthly_avg' => '45345'),
            array('name' =>  'oranges', 'image_url' => 'img/oranges.jpg', 'description' => '', 'price_avg' => '100', 'monthly_avg' => '7564'),
            array('name' =>  'papayas', 'image_url' => 'img/papayas.jpg', 'description' => '', 'price_avg' => '290', 'monthly_avg' => '23424'),
            array('name' =>  'papayas2', 'image_url' => 'img/papayas2.jpg', 'description' => '', 'price_avg' => '230', 'monthly_avg' => '6533'),
            array('name' =>  'potatoes', 'image_url' => 'img/potatoes.jpg', 'description' => '', 'price_avg' => '150', 'monthly_avg' => '76545'),
            array('name' =>  'pumpkins', 'image_url' => 'img/pumpkins.jpg', 'description' => '', 'price_avg' => '700', 'monthly_avg' => '34534'),
            array('name' =>  'tomatoes', 'image_url' => 'img/tomatoes.jpg', 'description' => '', 'price_avg' => '86', 'monthly_avg' => '23453')
        );

        foreach ($produces as $item) {
            DB::table('produces')->insert([
                'name' => $item['name'],
                'image_url' => $item['image_url'],
                'price_avg' => $item['price_avg'],
                'description' => $faker->paragraph(2)
            ]);

            $produceId = DB::getPdo()->lastInsertId();
            for ($i = 1; $i <= 12; $i++) {
                $percent = rand(-12, 15);
                $percentB = rand(-12, 15);
                $percentC = rand(-3, 5);
                $percentD = rand(-1, 2);
                $val = $item['monthly_avg'] * ($percent/100);
                $demand = $item['monthly_avg'] + $val;
                
                $val2 = $item['monthly_avg'] * ($percentB/100);
                $production = $item['monthly_avg'] + $val2;

                $val3 = $item['price_avg'] * ($percentC/100);
                $val4 = $item['price_avg'] * ($percentD/100);
                $orderPrice = $val3 + $item['price_avg'];
                $bidPrice = $val4 + $item['price_avg'];

                DB::table('stats')->insert([
                    'month' => $i,
                    'produce_id' => $produceId,
                    'produced' => $production,
                    'demanded' => $demand,
                    'bid_avg' => $bidPrice,
                    'order_avg' => $orderPrice
                ]);
            }
        }
        $Locations = array(
            array('country' => 'Guyana', 'region' => '4', 'address' => 'Borda Market G/Town'), //1
            array('country' => 'Guyana', 'region' => '4', 'address' => 'Sherif Street'), //2 
            array('country' => 'Guyana', 'region' => '4', 'address' => 'Georgetown Docks'), //3
            array('country' => 'Guyana', 'region' => '4', 'address' => 'Sherif Street'), //4
            array('country' => 'Guyana', 'region' => '4', 'address' => 'Albert Town'), //5
            array('country' => 'Guyana', 'region' => '3', 'address' => 'Parika'), //6
            array('country' => 'Guyana', 'region' => '3', 'address' => 'Lenora'), //7
            array('country' => 'Guyana', 'region' => '4', 'address' => 'Mon Repos E.C.D'), //8
            array('country' => 'Guyana', 'region' => '5', 'address' => 'Mahica'), //9
            array('country' => 'Guyana', 'region' => '6', 'address' => 'New Amsterdam'), //10
            array('country' => 'Guyana', 'region' => '6', 'address' => 'Rose Hall'), //11
            array('country' => 'Guyana', 'region' => '4', 'address' => 'Pleasance E.C.D'), //12
            array('country' => 'Trinidad', 'region' => '1', 'address' => 'Keys Port, Trinidad'), //13
            array('country' => 'Barbados', 'region' => '1', 'address' => 'Fly Barbados, Barbados') //14
        );

        foreach ($Locations as $loc) {
            DB::table('locations')->insert([
                'country' => $loc['country'],
                'region' =>  $loc['region'],
                'address' => $loc['address']
            ]);
        }

        $Buyers = array(
            array('bname' => 'G/Town Market Vendor 1', 'loc_id' => '1', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'G/Town Market Vender 2', 'loc_id' => '1', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'G/Town Resterants 1', 'loc_id' => '2', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Cruse Ships', 'loc_id' => '', 'desc' => '1', 'role' => 'buyer'),
            array('bname' => 'Survival Supermarket', 'loc_id' => '2', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Nigels Supermarket', 'loc_id' => '5', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Parika Market Vendor 1', 'loc_id' => '6', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Parika Market Vendor 2', 'loc_id' => '6', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Parika Supermarket 1', 'loc_id' => '6', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Lenora Supermarket 1', 'loc_id' => '7', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Lenora Supermarket 2', 'loc_id' => '7', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Mon Repos Vendor 1', 'loc_id' => '8', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Mon Repos Vendor 2', 'loc_id' => '8', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Mon Repos Vendor 3', 'loc_id' => '8', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Atlantic Gardens Supermarket 1', 'loc_id' => '8', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Mahica Market Vendor 1', 'loc_id' => '9', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Mahica Market Vendor 2', 'loc_id' => '9', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Mahica Market Vendor 3', 'loc_id' => '9', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'New Amsterdam Market Vendor 1', 'loc_id' => '10', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'New Amsterdam Market Vender 2', 'loc_id' => '10', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Port Mourant Market Vendor 1', 'loc_id' => '11', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Pleasance Market Vendor 1', 'loc_id' => '12', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Pleasance Supermarket 1', 'loc_id' => '12', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Trinidad Plantain Imports', 'loc_id' => '13', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Barbados Timber Imports', 'loc_id' => '14', 'desc' => '', 'role' => 'buyer'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier'),
            array('bname' => 'Local Joes', 'loc_id' => rand(1,14), 'desc' => '', 'role' => 'supplier')
        );

        foreach($Buyers as $i => $buyer) {
            DB::table('users')->insert([
                'username' => $faker->userName,
                'first_name' => $faker->firstName, 
                'last_name' => $faker->lastName, 
                'landline' => $faker->phoneNumber,
                'cellphone' => $faker->phoneNumber,
                'business_name' => $buyer['bname'], 
                'location_id' => (int) $buyer['loc_id'],
                'image_url' => $faker->url,
                'description' =>  $faker->paragraph(1),
                'email' => $faker->email,
                'password' => bcrypt('bitboat'),
            ]);

            $userType = 1;
            if ($buyer['role'] == 'buyer')
                $userType = 2;

            DB::table('user_roles')->insert([
                'user_id' => $i+1,
                'role_id' => $userType
            ]);

            for ($x = 1; $x <= 5; $x++ ) {
                DB::table('suppliers')->insert([
                    'user_id' => $i+1,
                    'produce_id' => rand(1, 20),
                    'availability' => rand(0, 1),
                    'quantity' => rand(5, 300)
                ]);
            }

            for ($x = 1; $x <= 3; $x++ ) {
                DB::table('orders')->insert([
                    'user_id' => $i+1,
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
