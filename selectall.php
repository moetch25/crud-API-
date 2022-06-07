<?php 
require_once 'connection.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD']=="GET") {
	$query = "SELECT * from customers";

	$runQuery = mysqli_query($conn,$query);

	$result = mysqli_fetch_all($runQuery , MYSQLI_ASSOC);

	$jsonApi = json_encode($result);

	echo "<pre>";
	print_r ($jsonApi);
	echo "<pre>";
}
else{

	msg("method not allowed" , 405);
}

