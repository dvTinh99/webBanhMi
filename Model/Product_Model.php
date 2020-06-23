<?php
require_once('Bean/Product_Obj.php');
require_once('ConnectToDB.php');


function getAllProducts(){
	$arrProducts = array();
	$conn = Connect();
	$sql = "SELECT * FROM `products` WHERE new =1 LIMIT 4";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$product = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
			array_push($arrProducts, $product);
		}
	} else {
		return $arrProducts ;
	}
	return $arrProducts ;
}	
function adminGetAllProducts(){
	$arrProducts = array();
	$conn = Connect();
	$sql = "SELECT * FROM `products`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$product = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
			array_push($arrProducts, $product);
		}
	} else {
		return $arrProducts ;
	}
	return $arrProducts ;
}	
// function getAllProducts($id_type){
// 	$arrProducts = array();
// 	$conn = Connect();
// 	$sql = "SELECT * FROM `products` WHERE new =1 LIMIT 4";
// 	$result = $conn->query($sql);

// 	if ($result->num_rows > 0) {
// 										  // output data of each row
// 		while($row = $result->fetch_assoc()) {
// 			$id = $row["id"];
// 			$name =  $row["name"];
// 			$id_type = $row["id_type"];
// 			$decription= $row["description"];
// 			$unit_price= $row["unit_price"];
// 			$promotion_price= $row["promotion_price"];
// 			$image= $row["image"];
// 			$unit= $row["unit"];
// 			$new_no = $row["new"];
// 			$create= $row["created_at"];
// 			$update= $row["updated_at"];
// 				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
// 			$product = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
// 			array_push($arrProducts, $product);
// 		}
// 	} else {
// 		return $arrProducts ;
// 	}
// 	return $arrProducts ;
// }	

function getTopProducts(){
	$arrProducts = array();
	$conn = Connect();
	$sql = "SELECT * FROM `products` ORDER BY promotion_price DESC limit 8";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$product = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
			array_push($arrProducts, $product);
		}
	} else {
		return $arrProducts ;
	}
	return $arrProducts ;
}	
function getSlide(){
	$arrSlide = array();
	$conn = Connect();
	$sql = "SELECT * FROM `slide`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {

			$name =  $row["image"];

			array_push($arrSlide, $name);
		}
	} else {
		return $arrSlide ;
	}
	return $arrSlide ;
}
function getProduct($id){
	$pro ;
	$conn = Connect();
	$sql = "SELECT * FROM `products` WHERE id = $id";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {

		$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$pro = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);

		}
	} else {
		return $pro ;
	}
	return $pro ;
}	
function searchProduct($id){
	$arrPro = array() ;
	$conn = Connect();
	$sql = "SELECT * FROM `products` WHERE name like '%$id%' ";
	//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {

		$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$pro = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
			array_push($arrPro, $pro);
	} 
		return $arrPro ;
	}
	return $arrPro ;
}

function getCheapProducts(){
	$arrProducts = array();
	$conn = Connect();
	$sql = "SELECT * FROM `products` ORDER BY unit_price ASC limit 4";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$product = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
			array_push($arrProducts, $product);
		}
	} else {
		return $arrProducts ;
	}
	return $arrProducts ;
}

function getProductsLike(){
	$arrProducts = array();
	$conn = Connect();
	$sql = "SELECT * FROM `products` WHERE name LIKE "%crepe%"";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$product = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
			array_push($arrProducts, $product);
		}
	} else {
		return $arrProducts ;
	}
	return $arrProducts ;
}
function getRelateProducts($id_type){
	$arrProducts = array();
	$conn = Connect();
	$sql = "SELECT products.id, products.name,products.id_type,products.description,
products.unit_price,products.promotion_price,products.image,
products.unit,products.new,products.created_at,products.updated_at
FROM products 
LEFT JOIN type_products 
ON products.id_type = type_products.id 
WHERE products.id_type = $id_type limit 3";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$product = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
			array_push($arrProducts, $product);
		}
	} else {
		return $arrProducts ;
	}
	return $arrProducts ;
}
function getTypeProducts($id_type){
	$arrProducts = array();
	$conn = Connect();
	$sql = "SELECT products.id, products.name,products.id_type,products.description,
products.unit_price,products.promotion_price,products.image,
products.unit,products.new,products.created_at,products.updated_at
FROM products 
LEFT JOIN type_products 
ON products.id_type = type_products.id 
WHERE products.id_type = $id_type ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name =  $row["name"];
			$id_type = $row["id_type"];
			$decription= $row["description"];
			$unit_price= $row["unit_price"];
			$promotion_price= $row["promotion_price"];
			$image= $row["image"];
			$unit= $row["unit"];
			$new_no = $row["new"];
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$product = new Product_Obj($id,$name,$id_type,$decription,$unit_price,$promotion_price,$image,$unit,$new_no,$create,$update);
			array_push($arrProducts, $product);
		}
	} else {
		return $arrProducts ;
	}
	return $arrProducts ;
}
?>