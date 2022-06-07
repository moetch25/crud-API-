<?php 
require_once 'connection.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD']=="POST") {
	$ALLdata = file_get_contents("php://input");
	$data = json_decode($ALLdata);
	$name = $data->customerName;
	$country = $data->country;
	//$name = $_POST['customerName'];
	//$country = $_POST['country'];
	$query = "insert into customers(`customerName` , `country`) values('$name', '$country')";
	$runQuery = mysqli_query($conn , $query);
	if ($runQuery) {
		msg("inserted Succesfully" , 200);
	}
	else{
		msg("Dosn't inserted", 406);
	}
}
else{
	msg("method not allowed" , 405);
}