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
    	$users = [
					[
						'email'		=> 'max@gmail.com',
						'user_type'	=> 'admin',
					],
					[
						'email'		=> 'abrarjahin@gmail.com',
						'user_type'	=> 'admin',
					]
				];

        foreach ($users as $user)
        {
			DB::table('users')->insert(
									[
										'full_name'					=> $faker->name($gender = null|'male'|'female'),
										'cell_no'					=> $faker->unique()->phoneNumber,
										'email'						=> $user['email'],
										'website'					=> $faker->url,
										'date_of_birth'				=> $faker->date($format = 'Y-m-d', $max = 'now'),
										'social_security_number'	=> $faker->unique()->uuid,
										'address'					=> $faker->address,
										'user_location'				=> DB::raw("GeomFromText('POINT(".$faker->latitude($min = -90, $max = 90)." ".$faker->longitude($min = -180, $max = 180).")')"),
										'password'					=> bcrypt('1234'),
										'user_type'					=> $user['user_type']
									]);
        }

        for ($x = 0; $x < 10; $x++)
		{
			DB::table('users')->insert(
									[
										'full_name'					=> $faker->name($gender = null|'male'|'female'),
										'cell_no'					=> $faker->unique()->phoneNumber,
										'email'						=> $faker->unique()->email,
										'website'					=> $faker->url,
										'date_of_birth'				=> $faker->date($format = 'Y-m-d', $max = 'now'),
										'social_security_number'	=> $faker->unique()->uuid,
										'address'					=> $faker->address,
										'user_location'				=> DB::raw("GeomFromText('POINT(".$faker->latitude($min = -90, $max = 90)." ".$faker->longitude($min = -180, $max = 180).")')"),
										'password'					=> bcrypt('1234'),
										'user_type'					=> 'normal_user'
									]);
		}
    }
}