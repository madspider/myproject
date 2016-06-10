<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMstImageTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'mstimage', function (Blueprint $table) {
			$table->increments ( 'image_id' );
			$table->string ( 'image_name', 256 );
			$table->string ( 'directory', 128 )->nullable ();
			$table->integer ( 'product_id' )->unsigned ();
			$table->foreign ( 'product_id' )->references ( 'product_id' )->on ( 'mstproduct' )->onDelete ( 'cascade' );
			$table->softDeletes();
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'mstimage' );
	}
}
