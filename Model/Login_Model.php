<?php
require_once("ConnectToDB.php");
session_start();

function checkAdmin($email,$pass){
	$conn = Connect();
	$sql = "SELECT * FROM `admin` WHERE admin_name = '". $email ."'and password ='". $pass ."'";
	echo $sql;
	$result = $conn->query($sql);
	if ($result && $result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$name =  $row["NameAdmin"];
			return $name ;
		}
	}else {
		return $name ;
	}
}

if (isset($_POST["email"])&&isset($_POST["pass"])) {
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$name = checkAdmin($email,$pass);
	if ($name != "") {
		
		$_SESSION["name"] = $name;
		if (!isset($_SESSION["cart"])) {
			$_SESSION["cart"] = array();
			
		}
		
		header("Location: http://localhost/WebBanhMi/index.php");
	}else{
		echo "wrongs";
	}
}


?>