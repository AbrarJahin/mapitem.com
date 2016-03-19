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
			$table->string('address', 255);
			//$table->float('location_latitude',10,7);
			//$table->float('location_longitude',10,7);
			$table->string('password', 120);
			$table->enum('user_type', ['admin', 'normal_user'])->default('normal_user');
			$table->enum('is_enabled', ['enabled', 'disabled'])->default('enabled');
			//FB Login Info		- 'fb_login'		table
			//Google Login Info	- 'gooogle_login'	table
			$table->rememberToken();
			$table->timestamps();
        });
        DB::statement('ALTER TABLE users ADD user_location POINT AFTER address' );
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

/*
	SELECT
	  id,
	  full_name,
	  website,
	  X(user_location) AS "latitude",
	  Y(user_location) AS "longitude",
	  (
	    GLength(
	      LineStringFromWKB(
	        LineString(
	          user_location, 
	          GeomFromText('POINT(51.5177 -0.0968)')
	        )
	      )
	    )
	  )
	  AS distance
	FROM users
	  ORDER BY distance ASC;
 */
