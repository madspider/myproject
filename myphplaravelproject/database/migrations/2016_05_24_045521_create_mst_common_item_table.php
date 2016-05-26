<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstCommonItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_common_item', function(Blueprint $table)
		{
			$table->integer('item_group_cd');
			$table->integer('item_key');
			$table->string('item_value', 128)->nullable();
			$table->string('option_value1', 128)->nullable();
			$table->string('option_value2', 128)->nullable();
			$table->string('option_value3', 128)->nullable();
			$table->integer('item_order')->nullable();
			$table->string('description', 256)->nullable();
			$table->integer('created_user_id')->nullable();
			$table->date('created_date')->nullable();
			$table->integer('updated_user_id')->nullable();
			$table->date('updated_date')->nullable();
			$table->integer('removed_user_id')->nullable();
			$table->date('removed_date')->nullable();
			$table->primary(['item_group_cd','item_key']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mst_common_item');
	}

}
