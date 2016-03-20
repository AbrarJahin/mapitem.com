<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('advertisements', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')			->unsigned()		->index();
			$table->integer('category_id')		->unsigned()		->index();
			$table->string('title', 150);
			$table->string('description', 150);

			$table->enum('is_active', ['active', 'inactive'])->default('active');
			$table->softDeletes();
			$table->integer('view_count')->unsigned()->default(0);

			//Foreign Keys
			$table->foreign('user_id')			->references('id')	->on('users');
			$table->foreign('category_id')		->references('id')	->on('categories');
			$table->timestamps();
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::drop('advertisements');
	}
}
