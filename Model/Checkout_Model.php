<?php
require_once('../Bean/User.php');
require_once('ConnectToDB.php');

require_once('User_Model.php');
if (isset($_POST['order'])) {

	$email = $_POST['email'] ;
	$fullname = $_POST['fullname'] ;
	$gender = $_POST["gender"];
	$address = $_POST['address'] ;
	$phone = $_POST['phone'] ;
	$note = $_POST["note"];
	$total = $_POST["total"];

	//echo $email."</br>".$fullname."</br>".$gender."</br>".$address."</br>".$phone."</br>".$note;


	$conn = Connect();
	$sql = "INSERT INTO customer (name, gender, email,address,phone_number,note)
	VALUES ('$fullname','$gender','$email','$address','$phone','$note')";

	if ($conn->query($sql) === TRUE) {
		$id_cus = getIdCustomer($email,$phone);
		$sql2 = "INSERT INTO bills (id_customer,total, note, name_Cus)
		VALUES ($id_cus,'$total','$note','$fullname')";

		if ($conn->query($sql2) === TRUE) {
			echo '<script>alert("ĐƠn ĐẶT HÀNG CỦA BẠN ĐANG ĐƯỢC SỬ LÍ")</script>';
			$arr = array();
			session_start();
			if (isset($_SESSION['cart'])) {
			unset($_SESSION['cart']);
			echo '<script>window.location.href = "http://localhost/WebBanhMi/index.php";</script>';
			}else{
				echo "không tồn tại";
				echo '<script>window.location.href = "http://localhost/WebBanhMi/index.php";</script>';
			}
			
			//echo '<script>window.location.href = "http://localhost/WebBanhMi/index.php";</script>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;

		}
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;

	}
	

}
?>