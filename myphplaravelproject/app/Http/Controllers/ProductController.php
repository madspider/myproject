<?php

namespace App\Http\Controllers;

use App\MstProduct;
use Illuminate\Http\Request as myrequest;
use League\Flysystem\update;
use Request;
use Response;
use View;
use DB;
use App\MstImage;
use App\Product;
use App\Category;
use App\MstCategory;

class ProductController extends Controller {
	public function index() {
		$datas = Product::paginate ( 2 );
		foreach ( $datas as $product ) {
			$mstImage = MstImage::where ( 'product_id', $product->product_id )->get ();
			$product->setImages ( $mstImage );
			
			$mstCategory = MstCategory::where ( 'category_id', $product->category_id )->get ();
			$product->setCategory ( $mstCategory );
		}
		$views = array (
				"2",
				"4",
				"6" 
		);
		
		return view ( 'pages/product_list' )->with ( [ 
				'products' => $datas,
				'views' => $views,
				'categories' => MstCategory::all () 
		] );
	}
	
	/**
	 * Posts
	 *
	 * @return void
	 */
	public function selectdataforpage() {
		$num = 1;
		if (isset ( $_GET ['num'] ) && $_GET ['num'] > 0) {
			$num = $_GET ['num'];
		}
		$datas = Product::paginate ( $num );
		foreach ( $datas as $product ) {
			$mstImage = MstImage::where ( 'product_id', $product->product_id )->get ();
			$product->setImages ( $mstImage );
			
			$mstCategory = MstCategory::where ( 'category_id', $product->category_id )->get ();
			$product->setCategory ( $mstCategory );
		}
		
		if (Request::ajax ()) {
			return Response::json ( View::make ( 'pages/product_table_content', array (
					'products' => $datas 
			) )->render () );
		}
		return View::make ( 'pages/product_list', array (
				'products' => $datas 
		) );
	}
	public function save(myrequest $request) {
		$data_input = $request->all ();
		$productId = $data_input ["product_id"];
		if (empty ( $productId ) || $productId == 0) {
			$mstproduct = new MstProduct ();
			$mstproduct->product_name = $data_input ["product_name"];
			$mstproduct->description = $data_input ["description"];
			$mstproduct->current_price = $data_input ["current_price"];
			$mstproduct->old_price = $data_input ["old_price"];
			$mstproduct->amount = $data_input ["amount"];
			$mstproduct->image_id = $data_input ["image_id"];
			$mstproduct->category_id = $data_input ["category_id"];
			$mstproduct->save ();
		} else {
			$mstproduct = MstProduct::where ( 'product_id', $data_input ["product_id"] )->update ( [ 
					'product_name' => $data_input ["product_name"],
					'description' => $data_input ["description"],
					'current_price' => $data_input ["current_price"],
					'product_name' => $data_input ["product_name"],
					'old_price' => $data_input ["old_price"],
					'image_id' => $data_input ["image_id"],
					'amount' => $data_input ["amount"],
					'category_id' => $data_input ["category_id"] 
			] );
		}
	}
	public function delete() {
		if (isset ( $_GET ['id'] ) && $_GET ['id'] > 0) {
			$mstproduct = MstProduct::where ( 'product_id', $_GET ['id'] )->delete ();
		}
		
		return "deleted";
	}
	function getimageproduct() {
		$products = null;
		if (isset ( $_GET ['id'] ) && $_GET ['id'] > 0) {
			$products = Product::where ( 'product_id', $_GET ['id'] )->get ()->toArray ();
			if (! empty ( $products ) && count ( $products ) == 1) {
				$products [0] ['images'] = MstImage::where ( 'product_id', $_GET ['id'] )->get ()->toArray ();
				$products [0] ['categories'] = MstCategory::all ()->toArray ();
			}
		}
		return $products;
	}
	
	/* for user */
	function display() {
		$categories = Category::all ();
		foreach ( $categories as $category ) {
			/*
			 * $products = Product::where ( 'category_id', $category->category_id )->get ();
			 * foreach ( $products as $product ) {
			 * $mstImage = MstImage::where ( 'image_id', $product->image_id )->get ();
			 * $product->setImages ( $mstImage );
			 * }
			 */
			$products = DB::table ( 'mstproduct' )->leftJoin ( 'mstimage', 'mstproduct.image_id', '=', 'mstimage.image_id' )->where ( 'mstproduct.category_id', '=', $category->category_id )->get ();
			$category->setProducts ( $products );
		}
		return view ( 'pages/product' )->with ( [ 
				'categories' => $categories 
		] );
	}
}
