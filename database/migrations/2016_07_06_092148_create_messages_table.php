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
			$table->text('message');

			//Foreign Keys
			$table->foreign('thread_id')	->references('id')  ->on('message_threads')	->onDelete('cascade')	->onUpdate('cascade');
			$table->foreign('sender_id')	->references('id')	->on('users')			->onDelete('cascade')	->onUpdate('cascade');

			$table->timestamp('created_at')->useCurrent();
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
