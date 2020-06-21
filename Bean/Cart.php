<?php

class Cart
{
	public $id;
	public $item_name ;
	public $item_price;
	public $sl =1 ;

	public function setItem_name($item_name){
		$this->item_name = $item_name;
	}
	public function setItem_price($item_price){
		$this->item_price = $item_price;
	}
	public function setSL(){
		$this->sl = $this->sl+1 ;
	}
	public function setID($id){
		$this->id = $id ;
	}
}
