<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class InfomationController extends Controller {
	public function getdirection() {
		return view ( 'pages\direction' );
	}
}
