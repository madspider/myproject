<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class WelcomeController extends BaseController
{
   
	public function index()
	{
		$data = "toi la diep";
		return view('pages/home')->with('name',$data);;
	}
}
