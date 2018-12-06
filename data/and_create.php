<?php
require 'conn.php';
require 'way2sms-api.php';

//$name=$_GET['name'];
$name=$_POST['name'];



$st1="insert into and_user values('$name','$name','$name')";
	   
	$getResults =sqlsrv_query( $conn,$st1);

	
if($getResults===false){
	echo"failed";
		header("HTTP/1.0 418 I'm A Teapot");
		http_response_code(808);
}
if($getResults === true)
{ 
header("HTTP/1.0 418 I'm A Teapot");
http_response_code(808);
}



?>