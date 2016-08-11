<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNotificationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_notifications', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('user_id')              ->unsigned()        ->index();
			$table->smallInteger('my_adds')	->unsigned()	->default(0);
			$table->smallInteger('offers')	->unsigned()	->default(0);
			$table->smallInteger('inbox')	->unsigned()	->default(0);

			//Foreign Keys
			$table->foreign('user_id')              ->references('id')  ->on('users')           ->onDelete('cascade')   ->onUpdate('cascade');

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
		Schema::drop('user_notifications');
	}
}
