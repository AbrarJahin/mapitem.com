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
			$table->integer('user_id')				->unsigned()		->index();
			$table->integer('advertisement_id')		->unsigned()		->index();
			$table->text('review');
			$table->timestamps();

			//Foreign Keys
			$table->foreign('user_id')				->references('id')	->on('users');
			$table->foreign('advertisement_id')		->references('id')	->on('advertisements');

			//Composite Primary Key
			$table->unique([
							'user_id',
							'advertisement_id'
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