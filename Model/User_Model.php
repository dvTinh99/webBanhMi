<?php
require_once('Bean/User.php');
require_once('ConnectToDB.php');


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
function getBill(){
	$arrBill = array();
	$conn = Connect();
	$sql = 'SELECT users.full_name, bills.date_order, bill_detail.unit_price 
	FROM ((bills 
	INNER JOIN users ON bills.id_customer = users.id) 
	INNER JOIN bill_detail ON bills.id = bill_detail.id_bill)';
//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$Bill = array(
			//"id" => $row["id"],
			//"id_customer" =>  $row["id_customer"],
				"full_name" => $row["full_name"],
			"date_order" => $row["date_order"],
			"total" => $row["unit_price"]
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

?>