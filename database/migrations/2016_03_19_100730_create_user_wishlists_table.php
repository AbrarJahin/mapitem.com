<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWishlistsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_wishlists', function (Blueprint $table)
		{
			$table->integer('user_id')				->unsigned()		->index();
			$table->integer('advertisement_id')		->unsigned()		->index();
			$table->timestamp('created_at')->useCurrent();

			//Foreign Keys
			$table->foreign('user_id')				->references('id')	->on('users')			->onDelete('cascade')	->onUpdate('cascade');;
			$table->foreign('advertisement_id')		->references('id')	->on('advertisements')	->onDelete('cascade')	->onUpdate('cascade');;

			//Composite Primary Key
			$table->unique([
							'user_id',
							'advertisement_id'
						],'user_wishlists_composite_key');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_wishlists');
	}
}
