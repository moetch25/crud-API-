<?php

function msg (string $errorName , int $num){
	echo json_encode($errorName);
	http_response_code($num);
}