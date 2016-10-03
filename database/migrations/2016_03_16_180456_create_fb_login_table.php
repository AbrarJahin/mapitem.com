<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbLoginTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fb_login', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('user_id')	->unsigned()	->unique();
			//Other Info for FB Auth
			$table->string('token', 200);
			$table->string('id', 20);
			$table->string('name', 100);
			$table->string('email', 60)	->unique();
			$table->string('avatar_url', 200);
			$table->string('avatar_original_url', 200);

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
		Schema::drop('fb_login');
	}
}
