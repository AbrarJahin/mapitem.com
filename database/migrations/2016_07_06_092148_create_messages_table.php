<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('thread_id')	->unsigned()	->index();
			$table->integer('sender_id')	->unsigned()	->index();
			$table->integer('receiver_id')	->unsigned()	->index();
			$table->enum('is_read', ['readed', 'not_readed'])->default('not_readed');
			$table->text('message');

			//Foreign Keys
			$table->foreign('thread_id')	->references('id')  ->on('message_threads')	->onDelete('cascade')	->onUpdate('cascade');
			$table->foreign('sender_id')	->references('id')	->on('users')			->onDelete('cascade')	->onUpdate('cascade');
			$table->foreign('receiver_id')	->references('id')	->on('users')			->onDelete('cascade')	->onUpdate('cascade');

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
		Schema::drop('messages');
	}
}
