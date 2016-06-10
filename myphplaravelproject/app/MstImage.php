<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MstImage extends Model {
	use SoftDeletes;
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'mstimage';
	protected $dates = [ 
			'deleted_at' 
	];
	/* public function product() {
		return $this->belongsTo ( 'App\MstProduct' );
	} */
}
