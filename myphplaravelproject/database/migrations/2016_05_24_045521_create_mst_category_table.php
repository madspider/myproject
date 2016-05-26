<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_category', function(Blueprint $table)
		{
			$table->integer('category_id')->primary();
			$table->string('category_name', 128)->nullable();
			$table->integer('created_user_id')->nullable();
			$table->date('created_date')->nullable();
			$table->integer('updated_user_id')->nullable();
			$table->date('updated_date')->nullable();
			$table->integer('removed_user_id')->nullable();
			$table->date('removed_date')->nullable();
			$table->string('description', 256)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mst_category');
	}

}
