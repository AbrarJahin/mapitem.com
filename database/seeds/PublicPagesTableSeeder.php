<?php

use Illuminate\Database\Seeder;

class PublicPagesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker		=	Faker\Factory::create();

		$titles		=	[
							"http://mapitem.com/blog/"=>"Blog",
							"site_map"			=>"Site Map",
							"privacy"			=>"Privacy",
							"about_us"			=>"About Us",
							"contact_us"		=>"Contact Us",
							"help"				=>"Help",
							"terms_conditions"	=>"Terms & Conditions"
						];

		foreach($titles as $key => $value)
		{
			DB::table('public_pages')->insert(
											[
												'url'			=> $key,
												'small_title'	=> $value,
												'big_title'		=> $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
												'description'	=> $faker->unique()->realText($maxNbChars = 1000, $indexSize = 3)
											]);
		}

	}
}
