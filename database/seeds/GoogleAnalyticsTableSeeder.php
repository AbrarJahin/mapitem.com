<?php

use Illuminate\Database\Seeder;

class GoogleAnalyticsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$analyticses = [
						[
							'route_name'	=>	'index',
							'url'			=>	'index',
							'detail'		=>	'Home Page'
						],
						[
							'route_name'	=>	'listing',
							'url'			=>	'listing',
							'detail'		=>	'Listing page'
						],
						[
							'route_name'	=>	'listing-search',
							'url'			=>	'listing-search',
							'detail'		=>	'Listing page after making a search'
						],
						[
							'route_name'	=>	'public_page',
							'url'			=>	'info/',
							'detail'		=>	'Info pages'
						]
					];

		//Insert the admins
		foreach ($analyticses as $analytics)
		{
			DB::table('google_analytics')->insert(
									[
										'route_name'	=> $analytics['route_name'],
										'url'			=> $analytics['url'],
										'detail'		=> $analytics['detail'],
										'created_at'	=>	Carbon\Carbon::now()->toDateTimeString()
									]);
		}
	}
}
