<?php
$connectionInfo = array("UID" => "sivasakthi@mseproject", "pwd" => "Cvasakthi96", "Database" => "mseproject", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:mseproject.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if($conn == false)

{

    die(print_r(sqlsrv_errors(), true));
 echo sqlsrv_errors();
}
else 
{
	
  //echo "connection successfull";	
}
	


?>