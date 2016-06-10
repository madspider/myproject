<?php

namespace App;

class Product extends MstProduct
{
    private $images;
    
    private $category;
    
    public function getImages(){
    	return $this->images;
    }
    
    public function setImages($images){
    	$this->images = $images;
    }
    
    public function getCategory(){
    	return $this->category;
    }
    
    public function setCategory($category){
    	$this->category = $category;
    }
}
