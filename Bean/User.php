<?php
class User {
	public $id ;
	public $email ;
	public $fullName ;
	public $address ;
	public $phone ;
	public $pass;


	function __construct($id,$email,$fullName,$address,$phone,$pass) {
		$this->id = $id;
		$this->email = $email ;
		$this->fullName = $fullName ;
		$this->address = $address ;
		$this->phone = $phone ;
		$this->pass = $pass ;

	}
}

?>