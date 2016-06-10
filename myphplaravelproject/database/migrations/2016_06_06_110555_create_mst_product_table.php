<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMstProductTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'mstproduct', function (Blueprint $table) {
			$table->increments ( 'product_id' );
			$table->string ( 'product_name', 128 );
			$table->string ( 'description', 256 )->nullable ();
			$table->float ( 'current_price', 10, 0 );
			$table->float ( 'old_price', 10, 0 )->nullable ();
			$table->integer ( 'amount' )->nullable ();
			$table->integer ( 'image_id' )->unsigned ();
			$table->integer ( 'category_id' )->unsigned ();
			$table->foreign ( 'category_id' )->references ( 'category_id' )->on ( 'mstcategory' )->onDelete ( 'cascade' );
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
		Schema::drop ( 'mstproduct' );
	}
}
