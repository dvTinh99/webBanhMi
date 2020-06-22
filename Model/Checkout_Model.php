<?php
require_once('ConnectToDB.php');
if (isset($_POST['order'])) {

	$email = $_POST['email'] ;
	$fullname = $_POST['fullname'] ;
	$gender = $_POST["gender"];
	$address = $_POST['address'] ;
	$phone = $_POST['phone'] ;
	$note = $_POST["note"];

	echo $email."</br>".$fullname."</br>".$gender."</br>".$address."</br>".$phone."</br>".$note;


	$conn = Connect();
	$sql = "INSERT INTO customer (name, gender, email,address,phone_number,note)
	VALUES ('$name','$gender','$email','$address','$phone','$note')";

	if ($conn->query($sql) === TRUE) {
		echo '<script>alert("ĐƠn ĐẶT HÀNG CỦA BẠN ĐANG ĐƯỢC SỬ LÍ")</script>';
		echo '<script>window.location.href = "http://localhost/WebBanhMi/index.php";</script>';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;

	}

}
?>