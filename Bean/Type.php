<?php
/**
 * 
 */
class Type
{
	public $id ;
	public $name;
	public $description;
	public $image;
	public $create ;
	public $update ;


	
	function __construct($id,$name,$description,$image,$create,$update)
	{
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->image = $image;
		$this->create = $create;
		$this->update = $update;
	}
	
}
?>