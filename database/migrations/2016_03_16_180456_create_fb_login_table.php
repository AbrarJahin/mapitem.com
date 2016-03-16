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
			$table->integer('user_id')		->unsigned()		->index();
			//Other Info for FB Auth

			$table->timestamps('created_at');

			//Foreign Keys
			$table->foreign('user_id')		->references('id')	->on('users');
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
