<?php
require_once("ConnectToDB.php");
require_once("./bean/Type.php");


function getAllType(){
	$arrType = array();
	$conn = Connect();
	$sql = "SELECT * FROM `type_products`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
										  // output data of each row
		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name =  $row["name"];
			
			$decription= $row["description"];
			
			
			$image= $row["image"];
			
			
			$create= $row["created_at"];
			$update= $row["updated_at"];
				//echo "id: " . $row["id"]. " - type: " . $row["id_type"]. " " . $row["image"]. "<br>";
			$type = new Type($id,$name,$decription,$image,$create,$update);
			array_push($arrType, $type);
		}
	} else {
		return $arrType ;
	}
	return $arrType ;
}
?>