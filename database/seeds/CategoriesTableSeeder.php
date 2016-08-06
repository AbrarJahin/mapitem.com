<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create();

		for ($x = 0; $x < 4; $x++)
		{
			DB::table('categories')->insert(
											[
												'name'	=> $faker->unique()->company
											]);
		}
    }
}
