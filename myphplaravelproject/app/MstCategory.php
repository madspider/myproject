<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MstCategory extends Model {
	use SoftDeletes;
	/*
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'mstcategory';
	protected $dates = [ 
			'deleted_at' 
	];
}
