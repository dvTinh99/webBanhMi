<?php
require_once('../Bean/User.php');
require_once('ConnectToDB.php');

require_once('User_Model.php');

function maxID(){
	$conn = Connect();
	$sql = "SELECT max(id) as id FROM bills";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
  // output data of each row
		while($row = $result->fetch_assoc()) {
			$max = $row['id'];
			return $max;
		}
	} else {
		echo "0 results";
	}
}
if (isset($_POST['order'])) {

	$email = $_POST['email'] ;
	$fullname = $_POST['fullname'] ;
	$gender = $_POST["gender"];
	$address = $_POST['address'] ;
	$phone = $_POST['phone'] ;
	$note = $_POST["note"];
	$total = $_POST["total"];
	//session_start();
	//print_r($_SESSION['cart']);

	//echo $email."</br>".$fullname."</br>".$gender."</br>".$address."</br>".$phone."</br>".$note;


	$conn = Connect();
	$sql = "INSERT INTO customer (name, gender, email,address,phone_number,note)
	VALUES ('$fullname','$gender','$email','$address','$phone','$note')";

	if ($conn->query($sql) === TRUE) {
		$id_cus = getIdCustomer($email,$phone);
		$max = maxID()+1;
		$sql2 = "INSERT INTO bills (id,id_customer,total, note, name_Cus)
		VALUES ($max,$id_cus,'$total','$note','$fullname')";

		if ($conn->query($sql2) === TRUE) {
			session_start();
			$arr = $_SESSION['cart'] ;
			foreach ($arr as $key => $value) {

				$sql3 = "INSERT INTO bill_detail(id_bill,id_product,quantity, unit_price)
				VALUES ($max,$value[item_id],$value[iteam_qua],$value[item_price])";
			//echo $sql3;
				if ($conn->query($sql3) === TRUE) {
					echo '<script>alert("ĐƠn ĐẶT HÀNG CỦA BẠN ĐANG ĐƯỢC SỬ LÍ")</script>';
				}else{
					echo '<script>alert('.$conn->error;')</script>';
			//echo $conn->error;
				}
			}
			

			
			
			if (isset($_SESSION['cart'])) {
				unset($_SESSION['cart']);
				echo '<script>window.location.href = "http://localhost/WebBanhMi/index.php";</script>';
			}else{
				echo "không tồn tại";
				echo '<script>window.location.href = "http://localhost/WebBanhMi/index.php";</script>';
			}
			
			echo '<script>window.location.href = "http://localhost/WebBanhMi/index.php";</script>';
		} else {
			echo "Error: " . $sql2 . "<br>" . $conn->error;

		}
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;

	}
	

}


?>