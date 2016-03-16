<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('users', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('full_name', 50);
			$table->string('cell_no', 20)->unique();
			$table->string('email', 60)->unique();
			$table->string('website', 70);
			$table->date('date_of_birth');
			$table->string('social_security_number', 15)->unique();
			$table->string('address', 100);
			$table->float('location_latitude');
			$table->float('location_longitude');
			$table->string('password', 120);
			//FB Login Info - 'fb_login' table
			//Google Login Info - 'gooogle_login' table
			$table->rememberToken();
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
        Schema::drop('users');
    }
}
