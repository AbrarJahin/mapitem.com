<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordRecoveriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('password_recoveries', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')		->unsigned();
			//Other Info for google Auth
			$table->string('token', 100)	->unique();
			$table->string('request_ip', 45);
			$table->string('apply_ip', 45);

			$table->dateTime('expire_time');
			$table->softDeletes();
			$table->timestamp('created_at')	->useCurrent();

			//Foreign Keys
			$table->foreign('user_id')	->references('id')	->on('users')	->onDelete('cascade')	->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('password_recoveries');
	}
}
