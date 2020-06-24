<?php
require_once('ConnectToDB.php');
if (isset($_GET['action'])) {
	$action = $_GET['action'];
	$id= $_GET['id'];
	if ($action == "delete") {
	$conn = Connect();
	$sql = "DELETE FROM products WHERE id= $id ";

	if ($conn->query($sql) === TRUE) {
		echo '<script>alert("delete thành công")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_index.php"</script> ';
	} else {
 // echo "Error deleting record: " . $conn->error;
		echo '<script>alert("Error deleting record: " . $conn->error)</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_index.php"</script> ';
	}

	$conn->close();
	}
	
}
if (isset($_GET['deleteBillDetail'])) {
	$id= $_GET['id'];
	
	$conn = Connect();
	$sql = "DELETE FROM bill_detail WHERE id_bill = $id ";

	if ($conn->query($sql) === TRUE) {
		echo '<script>alert("delete thành công")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_bill_detail.php"</script> ';
	} else {
 // echo "Error deleting record: " . $conn->error;
		echo '<script>alert("Error deleting record: " . $conn->error)</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_bill_detail.php"</script> ';
	}
	$conn->close();
	
}

if (isset($_GET['user'])) {
	$id= $_GET['id'];
	
	$conn = Connect();
	$sql = "DELETE FROM users WHERE id= $id ";

	if ($conn->query($sql) === TRUE) {
		echo '<script>alert("delete thành công")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_user.php"</script> ';
	} else {
 // echo "Error deleting record: " . $conn->error;
		echo '<script>alert("Error deleting record: " . $conn->error)</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_user.php"</script> ';
	}

	$conn->close();
	}
	if (isset($_GET['deleteBill'])) {
	$id= $_GET['id'];
	
	$conn = Connect();
	$sql = "DELETE FROM bills WHERE id= $id ";

	if ($conn->query($sql) === TRUE) {
		echo '<script>alert("delete thành công")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_bill.php"</script> ';
	} else {
 // echo "Error deleting record: " . $conn->error;
		echo '<script>alert("đã có lỗi ")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_bill.php"</script> ';
	}

	$conn->close();
	}

if (isset($_GET["delete_type"])) {
		$id = $_GET["id_type"];

		$conn = Connect();
	$sql = "DELETE FROM type_products WHERE id= $id ";
		if ($conn->query($sql) === TRUE) {
		echo '<script>alert("delete thành công")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_type.php"</script> ';
	} else {
 // echo "Error deleting record: " . $conn->error;
		echo '<script>alert("Error deleting record: " . $conn->error)</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_type.php"</script> ';
	}

	$conn->close();
	}
?>