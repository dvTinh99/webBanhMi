<?php
class User {

	public $email ;
	public $fullName ;
	public $address ;
	public $phone ;
	public $pass;


	function __construct($email,$fullName,$address,$phone,$pass) {
		$this->email = $email ;
		$this->fullName = $fullName ;
		$this->address = $address ;
		$this->phone = $phone ;
		$this->pass = $pass ;

	}
}

?>