<?php
require_once 'connection.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD']=="POST") {
	$uri = $_SERVER['REQUEST_URI'];
	$uri_content = explode('/', $uri);
	$term = end($uri_content);

	 //select before editing to get sure the customer is in database

	$SelectQuery = "SELECT * from customers WHERE customerNumber = $term";
	$runSelectQuery = mysqli_query($conn,$SelectQuery);

	if (mysqli_num_rows($runSelectQuery)>0) {
		// Lets Edit Now
		$name = $_POST['customerName'];
		$country = $_POST['country'];
		$editQuery = "update customers set customerName ='$name', country ='$country' WHERE customerNumber = $term";
		$runUpdateQuery = mysqli_query($conn,$editQuery);

		if ($runUpdateQuery) {
			msg("Data Updated Successfully",200);
		}
		else{
			msg("Error In Update",500);
		}
	}
	else{
		msg('No Data Founded' , 404);
	}
}
else{
	msg("method not allowed" , 405);
}


