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
			$table->integer('user_id')	->unsigned()	->unique();
			//Other Info for google Auth
			$table->string('token', 100);
			$table->string('id', 25);
			$table->string('name', 100);
			$table->string('email', 60)	->unique();
			$table->string('avatar_url', 200);

			$table->timestamps();

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
