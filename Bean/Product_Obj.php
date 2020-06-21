<?php
	/**
	 * 
	 */
	class Product_Obj
	{
		public $id;
		public $name;
		public $id_type;
		public $decription ;
		public $unit_price ;
		public $promotion_price;
		public $image ;
		public $unit;
		public $new_no ;
		public $create ;
		public $update ;

		public function __construct($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update){
			$this->id = $id;
			$this->name = $name;
			$this->id_type = $id_type;
			$this->decription = $decription;
			$this->unit_price = $unit_price;
			$this->promotion_price = $promotion_price;
			$this->image = $image;
			$this->new_no = $new_no;
			$this->unit = $unit;
			$this->create = $create;
			$this->update = $update;

		}
		public function setId($id){
			$this->id = $id ;
		}
		public function setName($name){
			$this->name = $name ;
		}
		public function setId_type($id_type){
			$this->id_type = $id_type ;
		}
		public function setDes($description){
			$this->decription = $description ;
		}
		public function setUnit_price($unit_price){
			$this->unit_price = $unit_price ;
		}
		public function setPromotion($promotion_price){
			$this->promotion_price = $promotion_price ;
		}
		public function setImage($image){
			$this->image = $image ;
		}
		public function setUnit($unit){
			$this->unit = $unit ;
		}
		public function setNew($new_no){
			$this->new_no = $new ;
		}
		public function setCreate($create){
			$this->create = $id ;
		}
		public function setUpdate($update){
			$this->update = $id ;
		}
	}
?>