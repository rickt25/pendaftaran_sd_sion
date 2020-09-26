<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){

            $name = $faker->unique($reset = true)->firstName;

    		DB::table('users')->insert([
    			'name' => $name,
    			'email' => $name.'@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => '1'
    		]);
 
    	}
    }
}
