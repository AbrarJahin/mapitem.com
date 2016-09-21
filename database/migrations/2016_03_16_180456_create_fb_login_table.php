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
		Schema::create('fb_lgin', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('user_id')	->unsigned()	->index();
			//Other Info for FB Auth
			$table->string('token', 200)				->unique();
			$table->string('id', 20)					->unique();
			$table->string('name', 100);
			$table->string('email', 60)					->unique();
			$table->string('avatar_url', 200)			->unique();
			$table->string('avatar_original_url', 200)	->unique();

			$table->timestamp('created_at')				->useCurrent();

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
		Schema::drop('fb_lgin');
	}
}
