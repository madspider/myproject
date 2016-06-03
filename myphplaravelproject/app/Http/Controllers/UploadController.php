<?php

namespace App\Http\Controllers;

use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class UploadController extends Controller {
	protected $image;
	public function __construct(ImageRepository $imageRepository) {
		$this->image = $imageRepository;
	}
	public function index() {
		return view ( 'pages\upload' );
	}
	public function upload() {
		return view ( 'pages\upload' );
	}
	
	public function temporaryupload(Request $request) {
		echo 'aa';
	}
}
