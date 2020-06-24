<?php
require_once('ConnectToDB.php');
$target_dir = "../image/product/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//insert type products
if (isset($_POST["insert_type"])) {
	$name_type = $_POST["name_type"] ;
	$description_type = $_POST["description_type"];

	$conn = Connect();
	$sql = "INSERT INTO type_products (name, description)
	VALUES ('$name_type','$description_type')";

	if ($conn->query($sql) === TRUE) {
		echo '<script>alert("insert thành công")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_type.php"</script> ';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;

	}
}

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$name = $_POST['name'] ;
	$id_type = $_POST['id_type'] ;
	$description = $_POST['description'] ;
	$price = $_POST['price'] ;
	$promo = $_POST['promo'] ;
	$unit = $_POST['unit'] ;
	$nameImage = basename($_FILES["fileToUpload"]["name"]) ;
	//echo $name."</br>".$id_type."</br>".$description."</br>".$price."</br>".$promo."</br>".$unit."</br>".$nameImage."</br>" ;
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
   // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    //echo "File is not an image.";
    echo '<script>alert("file không phải là một hình ảnh")</script>';
    echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_insert.php"</script>' ;
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
 // echo "Sorry, file already exists.";
	echo '<script>alert("hình ảnh đã tồn tại")</script>';
	echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_insert.php"</script>';

  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo '<script>alert("hình ảnh quá lớn")</script>';

  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	echo '<script>alert("chỉ định dạng ảnh : JPG, JPEG, PNG & GIF")</script>' ;
echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_insert.php"</script>';
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 // echo "Sorry, your file was not uploaded.";
	'<script>alert("đã có lỗi xảy ra")</script>';
// if everything is ok, try to upload file
}else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  	$conn = Connect();
	$sql = "INSERT INTO products (name, id_type, description,unit_price,promotion_price,image,unit)
	VALUES ('$name','$id_type','$description','$price','$promo','$nameImage','$unit')";

	if ($conn->query($sql) === TRUE) {
		echo '<script>alert("insert thành công")</script>';
		//header("Location: http://localhost/WebBanhMi/admin_index.php");
		echo '<script>window.location.href = "http://localhost/WebBanhMi/admin_index.php"</script> ';
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;

	}
	//echo '<script>alert("insert thành công")</script>';
   // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


?>