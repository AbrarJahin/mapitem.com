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
			$table->integer('user_id')              ->unsigned()        ->index();
			$table->integer('advertisement_id')     ->unsigned()        ->index();

			$table->smallInteger('new_offer')	->unsigned()	->default(0);

			//Foreign Keys
			$table->foreign('user_id')              ->references('id')  ->on('users')           ->onDelete('cascade')   ->onUpdate('cascade');
			$table->foreign('advertisement_id')     ->references('id')  ->on('advertisements')  ->onDelete('cascade')   ->onUpdate('cascade');

			//Composite Primary Key
			$table->unique([
								'user_id',
								'advertisement_id'
							],'user_add_composite_key');
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
