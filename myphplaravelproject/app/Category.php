<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends MstCategory {
	private $products;
	public function getProducts() {
		return $this->products;
	}
	public function setProducts($products) {
		$this->products = $products;
	}
}
