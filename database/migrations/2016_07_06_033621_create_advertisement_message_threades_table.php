<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementMessageThreadesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advertisement_messages_thread', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')		->unsigned()	->index();
			$table->integer('receiver_id')		->unsigned()	->index();
			$table->integer('advertisement_id')	->unsigned()	->index();

			//Foreign Keys
			$table->foreign('sender_id')		->references('id')	->on('users')			->onDelete('cascade');
			$table->foreign('receiver_id')		->references('id')	->on('users')			->onDelete('cascade');
			$table->foreign('advertisement_id')	->references('id')	->on('advertisements')	->onDelete('cascade');

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
		Schema::drop('advertisement_messages_thread');
	}
}
