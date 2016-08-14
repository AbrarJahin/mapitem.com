<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddNotificationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('add_notifications', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('advertisement_id')     ->unsigned()        ->unique();

			$table->smallInteger('new_offers')	->unsigned()	->default(0);

			//Foreign Keys
			$table->foreign('advertisement_id')     ->references('id')  ->on('advertisements')  ->onDelete('cascade')   ->onUpdate('cascade');

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
		Schema::drop('add_notifications');
	}
}
