<?php

namespace App\Http\Controllers;

use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\MstImage;
use App\MstCategory;
use App\MstProduct;

class UploadController extends Controller {
	protected $image;
	public function __construct(ImageRepository $imageRepository) {
		$this->image = $imageRepository;
	}
	public function index() {
		$mstProduct = null;
		$mstCategory = null;
		if (isset ( $_GET ['cid'] ) && $_GET ['cid'] > 0) {
			$mstCategory = MstCategory::where ( 'category_id', $_GET ['cid'] )->get ();
		} else {
			$mstCategory = MstCategory::all ();
		}
		
		if (! empty ( $mstCategory )) {
			if (isset ( $_GET ['pid'] ) && $_GET ['pid'] > 0) {
				$mstProduct = MstProduct::where ( 'category_id', $mstCategory [0]->category_id )->where ( 'product_id', $_GET ['pid'] )->get ();
			} else {
				$mstProduct = MstProduct::where ( 'category_id', $mstCategory [0]->category_id )->get ();
			}
		}
		
		return view ( 'pages\upload' )->with ( [ 
				'categories' => $mstCategory,
				'products' => $mstProduct 
		] );
	}
	function getproductbycategoryid() {
		$products = null;
		if (isset ( $_GET ['id'] ) && $_GET ['id'] > 0) {
			$products = MstProduct::where ( 'category_id', $_GET ['id'] )->get ()->toArray ();
		}
		return $products;
	}
	public function temporarydelete() {
		$temp_dir = "." . "/images/temp";
		if (! file_exists ( $temp_dir )) {
			echo "failed";
		}
		if (isset ( $_GET ['filename'] )) {
			$file = $_GET ['filename'];
			$tmp_name = "$temp_dir/$file";
			unlink ( $tmp_name );
		}
		return "ok";
	}
	public function temporaryupload() {
		/*
		 * $photo = Input::all ();
		 * //var_dump($photo); die();
		 * $response = $this->image->upload ( $photo );
		 * return $response;
		 */
		$output_dir = "." . "/images/temp";
		if (! file_exists ( $output_dir )) {
			mkdir ( $output_dir, 0777, true );
			chmod ( $output_dir, 0777 );
		}
		if (isset ( $_FILES ["file"] )) {
			// if (in_array($_FILES["file"]["type"], $allowedFileType) && in_array($extension, $allowedExts)) {
			
			if (( int ) $_FILES ["file"] ["size"] > (10 * 1000000)) {
				echo "exceed_limit_size";
			} else {
				if (( int ) $_FILES ["file"] ["error"] <= 0) {
					// $dateNow = date('YmdHis');
					$fileName = $_FILES ["file"] ["name"];
					$tmp_name = $_FILES ["file"] ["tmp_name"];
					move_uploaded_file ( $tmp_name, "$output_dir/$fileName" );
					// echo $this->view->config['url_base'] . Core_Util_Const::PATH_PRODUCT_IMAGE_TEMP . Core_Util_Helper::getIdAdminLogin() . '/' . $fileName;
					echo "ok";
				}
			}
		}
	}
	
	/**
	 * imguploadAction
	 */
	public function upload(Request $request) {
		$data_input = $request->all ();
		$categoryid = $data_input ["category_id"];
		$productid = $data_input ["product_id"];
		$output_dir = "." . "/images/categories/" . $categoryid . "/" . $productid;
		$temp_dir = "." . "/images/temp";
		
		if (! file_exists ( $temp_dir )) {
			echo "failed";
		}
		
		if (! file_exists ( $output_dir )) {
			mkdir ( $output_dir, 0777, true );
			chmod ( $output_dir, 0777 );
		}
		
		$filename_array = explode ( ',', $data_input ["lstName"] );
		if (empty ( $filename_array )) {
			return "failed";
		} else {
			$indx = 0;
			foreach ( $filename_array as $file ) {
				$temp = explode ( ".", $file );
				$extension = end ( $temp );
				$dateNow = date ( 'YmdHis' );
				$fileName = $dateNow . $indx ++ . '.' . strtolower ( $extension );
				$tmp_name = "$temp_dir/$file";
				if (! file_exists ( $tmp_name )) {
					echo "failed";
				}
				
				copy ( $tmp_name, "$output_dir/$fileName" );
				// save
				$this->save ( $categoryid, $productid, $fileName, $output_dir );
				// deletetemp
				unlink ( $tmp_name );
			}
		}
	}
	function save($categoryid, $productid, $fileName, $output_dir) {
		$mstimage = new MstImage ();
		$mstimage->product_id = $productid;
		$mstimage->image_name = $fileName;
		$mstimage->directory = $output_dir;
		
		$mstimage->save ();
	}
}
