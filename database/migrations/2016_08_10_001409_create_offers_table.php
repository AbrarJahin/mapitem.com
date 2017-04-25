<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('add_id')       ->unsigned()        ->index();
			$table->integer('sender_id')    ->unsigned()        ->index();
			$table->integer('price');
			$table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
			$table->text('message');

			//Foreign Keys
			$table->foreign('add_id')       ->references('id')  ->on('advertisements')  ->onDelete('cascade')   ->onUpdate('cascade');
			$table->foreign('sender_id')    ->references('id')  ->on('users')           ->onDelete('cascade')   ->onUpdate('cascade');

			//Composite Primary Key
			$table->unique([
								'add_id',
								'sender_id'
							],'offer_composite_key');

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
		Schema::drop('offers');
	}
}
