<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoogleLoginTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('google_login', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('user_id')	->unsigned()	->index();
			//Other Info for google Auth
			$table->string('token', 100)		->unique();
			$table->string('id', 25)			->unique();
			$table->string('name', 100);
			$table->string('email', 60)			->unique();
			$table->string('avatar_url', 200)	->unique();

			$table->timestamp('created_at')		->useCurrent();

			//Foreign Keys
			$table->foreign('user_id')		->references('id')	->on('users')	->onDelete('cascade')	->onUpdate('cascade');
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::drop('google_login');
	}
}
