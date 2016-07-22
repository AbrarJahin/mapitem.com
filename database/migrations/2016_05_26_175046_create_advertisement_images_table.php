<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementImagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advertisement_images', function (Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('advertisement_id')	->unsigned()		->index();
			$table->string('image_name', 255);
			//Foreign Keys
			$table->foreign('advertisement_id')	->references('id')	->on('advertisements')	->onDelete('cascade')	->onUpdate('cascade');;
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::drop('advertisement_images');
		//Delete add images in upload folder => Including User Profile Image
		File::cleanDirectory(	public_path(	'uploads'	)	);
		//Create gitkeep file for not removing git maintainablity
		File::put(	public_path(	'uploads/.gitkeep'	),'');
	}
}
