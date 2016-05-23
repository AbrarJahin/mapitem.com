<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('category_id')  ->unsigned()    ->index();
            $table->string('name', 25)->unique();

            //Foreign Keys
            $table->foreign('category_id')              ->references('id')  ->on('categories');

            //Composite Primary Key
            $table->unique([
                                'category_id',
                                'name'
                            ],'sub_category_composite_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_categories');
    }
}
