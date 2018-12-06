
<?php
require 'conn.php';
require 'way2sms-api.php';

try{

$name=$_GET['name'];


$str="select * from alert_account where username='$name'";
$s = sqlsrv_query($conn,$str);
	
		$numberOfRows =sqlsrv_has_rows( $s );	
	$row = sqlsrv_fetch_array($s,SQLSRV_FETCH_NUMERIC);
    $num=$row[1];
	    $msg=$name.' NEEDS HELP ';
			//$status->status="200";
			//echo $msg;
				
    $result=sendWay2SMS( '9677798321' ,'cva1996' ,$num ,$msg);  
	
	 if($result==true)
	{ 

echo '<h3 class="text-success"> MESSAGE SENT </h3>';
	$status->status="200";
	echo json_encode($status);
	
	
	
}
else{
	//echo  "<h2> MESSAGE NOT SENT</h2></br>";
	$status->status="401";
	echo json_encode($status);
}

}
catch(PDOException $e){
	
}

?>