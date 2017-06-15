<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageThreadesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_threads', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('sender_id')		->unsigned()	->index();
			$table->integer('receiver_id')		->unsigned()	->index();
			$table->integer('advertisement_id')	->unsigned()	->index();
			$table->string('title',100);
			$table->enum('is_read', ['readed', 'not_readed'])->default('not_readed');
			$table->integer('last_sender_id')	->unsigned()	->index();

			//Foreign Keys
			$table->foreign('sender_id')		->references('id')	->on('users')			->onDelete('cascade')	->onUpdate('cascade');
			$table->foreign('receiver_id')		->references('id')	->on('users')			->onDelete('cascade')	->onUpdate('cascade');
			$table->foreign('advertisement_id')	->references('id')	->on('advertisements')	->onDelete('cascade')	->onUpdate('cascade');
			$table->foreign('last_sender_id')	->references('id')	->on('users')			->onDelete('cascade')	->onUpdate('cascade');

			//Composite Primary Key
			$table->unique([
								'sender_id',
								'receiver_id',
								'advertisement_id'
							],'thread_constraint');

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
		Schema::drop('message_threads');
	}
}
