<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMstUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mst_user', function(Blueprint $table)
		{
			$table->integer('user_id')->primary();
			$table->string('login_id', 128)->nullable();
			$table->string('password', 64)->nullable();
			$table->date('login_date')->nullable();
			$table->string('last_name', 64)->nullable();
			$table->string('first_name', 64)->nullable();
			$table->string('email', 128)->nullable();
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
		Schema::drop('mst_user');
	}

}
