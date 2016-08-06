<?php

use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker		= Faker\Factory::create();

		for ($x = 0; $x < 20; $x++)
		{
			DB::table('sub_categories')->insert(
											[
												'category_id'	=> $faker->randomElement(App\Category::lists('id')->toArray()),
												'name'			=> $faker->unique()->streetName
											]);
		}
    }
}
