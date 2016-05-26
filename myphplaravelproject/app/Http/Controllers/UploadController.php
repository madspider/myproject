<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\MstUser;

class UploadController extends BaseController
{
   
	public function index()
	{
		return view('pages/upload');
	}
	
	public function temporaryupload()
	{
		return view('pages/upload');
	}
	
}
