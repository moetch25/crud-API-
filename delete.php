<?php
require_once 'connection.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD']=="DELETE") {
	$uri = $_SERVER['REQUEST_URI'];
	$uri_content = explode('/', $uri);
	$term = end($uri_content);

	 //select before Deleteing to get sure the customer is in database

	$SelectQuery = "SELECT * from orderdetails WHERE orderNumber = $term";
	$runSelectQuery = mysqli_query($conn,$SelectQuery);

	if (mysqli_num_rows($runSelectQuery)>0) {
		// Lets Delete Now
		$Deletequery = "DELETE FROM orderdetails WHERE orderNumber =$term";
		$runDelete = mysqli_query($conn,$Deletequery);
		if ($runDelete) {
			msg("Data Deleted Successfully",501);
		}
		else{
			msg("error While Deleting Data",502);
		}


	}
	else{
		msg('No Data Founded' , 404);
	}
}
else{
	msg("method not allowed" , 405);
}


