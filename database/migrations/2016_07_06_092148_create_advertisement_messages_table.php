<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementMessagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advertisement_messages', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')				->unsigned()	->index();
			$table->integer('receiver_id')				->unsigned()	->index();
			$table->integer('advertisement_thread_id')	->unsigned()	->index();

			//Foreign Keys
			$table->foreign('sender_id')				->references('id')  ->on('users')							->onDelete('cascade')	->onUpdate('cascade');
			$table->foreign('receiver_id')				->references('id')  ->on('users')							->onDelete('cascade')	->onUpdate('cascade');
			$table->foreign('advertisement_thread_id')	->references('id')  ->on('advertisement_messages_thread')	->onDelete('cascade')	->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('advertisement_messages');
	}
}