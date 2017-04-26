<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicPagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('public_pages', function (Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedTinyInteger('page_order')->default(0);
			$table->string('url', 100)			->nullable(false)	->unique();
			$table->string('small_title', 20)	->nullable(false)	->unique();
			$table->string('big_title', 255)	->nullable(true)	->unique();
			$table->longText('description')		->nullable(false);
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
		Schema::drop('public_pages');
	}
}
