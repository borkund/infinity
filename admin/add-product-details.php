<?php
  include("db_connection.php");
  if(!empty($_SESSION["infinity_user_name"])){ 
	if (!empty($_POST)){
	
		$product_name = $_POST['product_name'];
		$product_unit	   = $_POST['product_unit'];
		$product_price_with_gst	   = $_POST['product_price_with_gst'];
		$product_price_without_gst	   = $_POST['product_price_without_gst'];
		$product_quantity	   = $_POST['product_quantity'];
		$product_stock	   = $_POST['product_quantity'];
		$added_by	   = $_SESSION["id"];
		$added_date	   = date("Y-m-d h:i:s");
		$modified_date	   = date("Y-m-d h:i:s");
		//echo $fname;exit;		
		
		$sql = "INSERT INTO `product_master`(`product_name`, `product_unit`, `product_price_with_gst`, `product_price_without_gst`, `product_quantity`, `product_stock`, `added_by`, `added_date`, `modified_date`)  
		VALUES ('".$product_name."','".$product_unit."','".$product_price_with_gst."','".$product_price_without_gst."','".$product_quantity."','".$product_stock."','".$added_by."','".$added_date."','".$modified_date."')";

		if ($conn->query($sql) === TRUE) {
		  header("location: product-list.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}	
	}
	
   }else{
	   header("location: login.php");
   }		
   ?>