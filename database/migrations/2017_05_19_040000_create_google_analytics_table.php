<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoogleAnalyticsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('google_analytics', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->enum('is_enabled',				['enabled', 'disabled'])->default('enabled');
			$table->string('route_name', 100)		->nullable(false)		->unique();
			$table->string('url', 100)				->nullable(true)		->unique();
			$table->string('detail', 255)			->nullable(true);
			$table->longText('analytics_script')	->nullable(true);
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
		Schema::drop('google_analytics');
	}
}
