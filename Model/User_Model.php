<?php

require_once('ConnectToDB.php');
require_once('Bean/User.php');

function getAllUser(){
	$arrUser = array();
	$conn = Connect();
	$sql = "SELECT * FROM users ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$full_name =  $row["full_name"];
			$email = $row["email"];
			$password= $row["password"];
			$phone= $row["phone"];
			$address= $row["address"];

			$User = new User($id,$email,$full_name,$address,$phone,$password);
			array_push($arrUser, $User);
		}
	} else {
		return $arrUser ;
	}
	return $arrUser ;
}
function getBillDetail(){
	$arrBill = array();
	$conn = Connect();
	$sql = 'SELECT bills.id, id_product,products.name, quantity FROM bill_detail, bills ,products WHERE bill_detail.id_bill = bills.id and bill_detail.id_product = products.id';
	// $sql = 'SELECT users.full_name, bills.created_at, bill_detail.unit_price 
	// FROM ((bills 
	// INNER JOIN users ON bills.id_customer = users.id) 
	// INNER JOIN bill_detail ON bills.id = bill_detail.id_bill)';
//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$Bill = array(
			"id_bill" => $row["id"],
			//"id_customer" =>  $row["id_customer"],
				"id_product" => $row["id_product"],
			"name" => $row["name"],
		"quantity" => $row["quantity"]
			//"id_product" => $row["id_product"],
			//"quantity" => $row["quantity"]
			);
			array_push($arrBill, $Bill);
		}
	} else {
		return $arrBill ;
	}
	return $arrBill ;
}
function getBill(){
	$arrBill = array();
	$conn = Connect();
	$sql = 'SELECT id,name_Cus,total,note,created_at FROM `bills`';
	// $sql = 'SELECT users.full_name, bills.created_at, bill_detail.unit_price 
	// FROM ((bills 
	// INNER JOIN users ON bills.id_customer = users.id) 
	// INNER JOIN bill_detail ON bills.id = bill_detail.id_bill)';
//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$Bill = array(
			"id" => $row["id"],
			//"id_customer" =>  $row["id_customer"],
				"full_name" => $row["name_Cus"],
			"date_order" => $row["created_at"],
			"total" => $row["total"],
			"note" => $row["note"]
			//"id_product" => $row["id_product"],
			//"quantity" => $row["quantity"]
			);
			array_push($arrBill, $Bill);
		}
	} else {
		return $arrBill ;
	}
	return $arrBill ;
}
function getIdCustomer($email,$phone){
	
	$conn = Connect();
	$sql = "select id from customer WHERE email = '$email' and phone_number ='$phone'";
	// $sql = 'SELECT users.full_name, bills.created_at, bill_detail.unit_price 
	// FROM ((bills 
	// INNER JOIN users ON bills.id_customer = users.id) 
	// INNER JOIN bill_detail ON bills.id = bill_detail.id_bill)';
//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_cus = $row["id"];
		}
	return $id_cus ;
	} else {
		return "lỗi" ;
	}
	return "lỗi" ;
}

?>