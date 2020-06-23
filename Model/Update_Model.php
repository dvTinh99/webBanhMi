<?php
require_once('ConnectToDB.php');

if(isset($_POST["submit"])) {
	$id = $_POST['id'];
	$name = $_POST['name'] ;
	$id_type = $_POST['id_type'] ;
	$description = $_POST['description'] ;
	$price = $_POST['price'] ;
	$promo = $_POST['promo'] ;
	$unit = $_POST['unit'] ;
	//echo $description ;
	$conn = Connect();
	$sql = "UPDATE products SET name = '$name',id_type = '$id_type',
	description = '$description',unit_price = '$price',promotion_price = '$promo',unit = '$unit' WHERE id= '$id'";

	if ($conn->query($sql) === TRUE) {
		//echo "success";
		echo '<script>alert("update thành công")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_index.php"</script> ';
	} else {
		
		echo '<script>alert("Error update record")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_index.php"</script> ';
	}

	$conn->close();
}
?>