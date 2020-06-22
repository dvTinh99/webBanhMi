<?php

require_once('ConnectToDB.php');
if (isset($_POST['signup'])) {
	$email = $_POST['email'] ;
	$fullname = $_POST['fullname'] ;
	$address = $_POST['address'] ;
	$phone = $_POST['phone'] ;
	$pass = $_POST['pass'] ;

	$conn = Connect();
	$sql = "INSERT INTO users (full_name, email, password,phone,address)
	VALUES ('$fullname','$email','$pass','$phone','$address')";

	if ($conn->query($sql) === TRUE) {
		echo '<script>alert("Signup success")</script>';
		header("Location: http://localhost/WebBanhMi/login.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;

	}

}
?>