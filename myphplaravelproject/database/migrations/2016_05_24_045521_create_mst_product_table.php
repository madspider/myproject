<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_product', function(Blueprint $table)
		{
			$table->integer('product_id')->primary();
			$table->string('product_name', 128);
			$table->string('description', 256)->nullable();
			$table->float('current_price', 10, 0)->nullable();
			$table->float('old_price', 10, 0)->nullable();
			$table->integer('amount')->nullable();
			$table->integer('created_user_id')->nullable();
			$table->date('created_date')->nullable();
			$table->integer('updated_user_id')->nullable();
			$table->date('updated_date')->nullable();
			$table->integer('removed_user_id')->nullable();
			$table->date('removed_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mst_product');
	}

}
