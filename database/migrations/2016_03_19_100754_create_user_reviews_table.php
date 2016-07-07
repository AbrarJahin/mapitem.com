<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReviewsTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('user_reviews', function (Blueprint $table)
		{
			$table->integer('user_id')		->unsigned()		->index();
			$table->integer('add_id')		->unsigned()		->index();
			$table->text('review');
			$table->integer('rating',1);
			$table->timestamps();

			//Foreign Keys
			$table->foreign('user_id')		->references('id')	->on('users')			->onDelete('cascade')	->onUpdate('cascade');;
			$table->foreign('add_id')		->references('id')	->on('advertisements')	->onDelete('cascade')	->onUpdate('cascade');;

			//Composite Primary Key
			$table->unique([
							'user_id',
							'add_id'
						],'user_reviews_composite_key');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::drop('user_reviews');
	}
}
