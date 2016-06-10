<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MstProduct extends Model {
	use SoftDeletes;
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'mstproduct';
	protected $dates = [ 
			'deleted_at' 
	];
	/* public function images() {
		return $this->hasMany ( 'App\MstImage' );
	} */
	
	private $images;
	
	public function getImages(){
		return $this->images;
	}
	
	public function setImages($images){
		$this->images = $images;
	}
}
