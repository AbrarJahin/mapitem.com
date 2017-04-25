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
			$table->string('url', 50)			->unique();
			$table->string('small_title', 20)	->unique();
			$table->string('big_title', 255)	->unique()	->nullable();
			$table->longText('description')		->nullable();
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
