<?php 
require_once 'connection.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD']=="GET") {
	$id = $_GET['id'];
	$query = "SELECT * from customers WHERE customerNumber = $id";

	$runQuery = mysqli_query($conn,$query);
	if (mysqli_num_rows($runQuery)>0) {
		$result = mysqli_fetch_row($runQuery);

		$jsonApi = json_encode($result);

		echo "<pre>";
		print_r ($jsonApi);
		echo "<pre>";
	}
	else{
		msg("No Data Founded" , 404);
	}
	
}
else{

	msg("method not allowed" , 405);
}

