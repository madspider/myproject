<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\User;

class WelcomeController extends BaseController
{
   
	public function index()
	{
		$datas = User::paginate(10);
		foreach ($datas as $data){
			$data->all();
		}
		return view('pages/home')->with('mstusers', $datas);
	}
}
