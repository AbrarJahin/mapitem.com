<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$consoleOut = new ConsoleOutput();
		$faker = Faker\Factory::create();
		//Not Logged In User Creation For View Count
		DB::table('users')->insert(
			[
				'id'						=>	1,
				'first_name'				=> 'Not Logged In',
				'last_name'					=> 'User',
				'email'						=> 'not@logged.in',
				'cell_no'					=> '000000',
				'website'					=> 'not.logged/in',
				'date_of_birth'				=> $faker->date($format = 'Y-m-d', $max = 'now'),
				'social_security_number_p1'	=> $faker->unique()->uuid,
				'social_security_number_p2'	=> $faker->unique()->uuid,
				'social_security_number_p3'	=> $faker->unique()->uuid,
				'address'					=> $faker->address,
				'location_latitude'			=> $faker->latitude($min = -90, $max = 90),
				'location_longitude'		=> $faker->longitude($min = -180, $max = 180),
				'password'					=> 'No need to log in with this user',
				'user_type'					=> 'normal_user'
			]
		);
		DB::table('users')->insert(
			[
				'id'						=>	2,
				'first_name'				=> 'Abrar',
				'last_name'					=> 'Jahin',
				'email'						=> 'abrarjahin@gmail.com',
				'cell_no'					=> '+8801822804636',
				'website'					=> 'abrarjahin.me',
				'date_of_birth'				=> $faker->date($format = 'Y-m-d', $max = 'now'),
				'social_security_number_p1'	=> $faker->unique()->uuid,
				'social_security_number_p2'	=> $faker->unique()->uuid,
				'social_security_number_p3'	=> $faker->unique()->uuid,
				'address'					=> $faker->address,
				'location_latitude'			=> $faker->latitude($min = -90, $max = 90),
				'location_longitude'		=> $faker->longitude($min = -180, $max = 180),
				'password'					=> bcrypt('123'),
				'user_type'					=> 'admin'
			]
		);
		return;

		$users = [
					[
						'email'		=> 'maxezoory@gmail.com',
						'user_type'	=> 'admin',
					],
					[
						'email'		=> 'abrarjahin@gmail.com',
						'user_type'	=> 'admin',
					],
					[
						'email'		=> 'abrarjahin@live.com',
						'user_type'	=> 'normal_user',
					]
				];
		//Insert the admins
		$id = 1;
		foreach ($users as $user)
		{
			$consoleOut->writeln($faker->unique()->phoneNumber);
			DB::table('users')->insert(
									[
										'id'						=>	++$id,
										'first_name'				=> $faker->firstName($gender = null|'male'|'female'),
										'last_name'					=> $faker->lastName,
										'email'						=> $user['email'],
										'cell_no'					=> $faker->unique()->phoneNumber,
										'website'					=> $faker->url,
										'date_of_birth'				=> $faker->date($format = 'Y-m-d', $max = 'now'),
										'social_security_number_p1'	=> $faker->unique()->uuid,
										'social_security_number_p2'	=> $faker->unique()->uuid,
										'social_security_number_p3'	=> $faker->unique()->uuid,
										'address'					=> $faker->address,
										'location_latitude'			=> $faker->latitude($min = -90, $max = 90),
										'location_longitude'		=> $faker->longitude($min = -180, $max = 180),
										'password'					=> bcrypt('*123*Simple#'),
										'user_type'					=> $user['user_type']
									]);
		}

		//insert 10 random users as demo user
		for ($x = 0; $x < 10; $x++)
		{
			DB::table('users')->insert(
									[
										'first_name'				=> $faker->firstName($gender = null|'male'|'female'),
										'last_name'					=> $faker->lastName,
										'email'						=> $faker->unique()->email,
										'cell_no'					=> $faker->unique()->phoneNumber,
										'website'					=> $faker->url,
										'date_of_birth'				=> $faker->date($format = 'Y-m-d', $max = 'now'),
										'social_security_number_p1'	=> $faker->unique()->uuid,
										'social_security_number_p2'	=> $faker->unique()->uuid,
										'social_security_number_p3'	=> $faker->unique()->uuid,
										'address'					=> $faker->address,
										'location_latitude'			=> $faker->latitude($min = -90, $max = 90),
										'location_longitude'		=> $faker->longitude($min = -180, $max = 180),
										'password'					=> bcrypt('*123#'),
										'user_type'					=> 'normal_user'
									]);
		}
	}
}
