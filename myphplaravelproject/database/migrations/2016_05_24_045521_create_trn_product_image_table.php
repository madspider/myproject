<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrnProductImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trn_product_image', function(Blueprint $table)
		{
			$table->integer('product_id');
			$table->integer('image_id');
			$table->integer('created_user_id')->nullable();
			$table->date('created_date')->nullable();
			$table->integer('updated_user_id')->nullable();
			$table->date('updated_date')->nullable();
			$table->integer('removed_user_id')->nullable();
			$table->date('removed_date')->nullable();
			$table->integer('main_flag')->nullable();
			$table->primary(['product_id','image_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trn_product_image');
	}

}
