<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAdvertisementViewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_add_views', function (Blueprint $table)
		{
			$table->integer('user_id')				->unsigned()		->index();
			$table->integer('add_id')		->unsigned()		->index();
			$table->integer('total_view')			->integer()		->default(1);
			//Removed all keys for making things faster
			//Foreign Keys
			$table->foreign('user_id')				->references('id')	->on('users');
			$table->foreign('add_id')		->references('id')	->on('advertisements');

			//Composite Primary Key
			$table->unique([
								'user_id',
								'add_id'
							],'user_add_views_ck');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_advertisement_views');
	}
}
