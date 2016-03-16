<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('fb_logins', function (Blueprint $table)
		{
            $table->integer('user_id')      ->unsigned()        ->index();
            //Other Info for google Auth

            $table->timestamps('created_at');

            //Foreign Keys
            $table->foreign('user_id')      ->references('id')  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fb_logins');
    }
}
